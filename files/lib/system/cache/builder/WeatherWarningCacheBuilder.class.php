<?php

namespace wcf\system\cache\builder;

use wcf\system\exception\SystemException;
use wcf\util\HTTPRequest;
use wcf\util\JSON;

/**
 * Caches weather warning data from DWD
 * 
 * @author      Marco Daries, Alexander Langer (Source of ideas)
 * @copyright   2020 Daries.info
 * @license     Attribution-NoDerivatives 4.0 International (CC BY-ND 4.0) <https://creativecommons.org/licenses/by-nd/4.0/>
 * @package     WoltLabSuite\Core\System\Cache\Builder
 */
class WeatherWarningCacheBuilder extends AbstractCacheBuilder
{

    const GERMANY_FORESTFIREHAZARDINDEXWBI_URL = 'https://www.dwd.de/DWD/warnungen/agrar/wbx/wbx_stationen.png';
    const GERMANY_REGION_URL = 'https://www.dwd.de/DWD/warnungen/warnapp/json/warnings.json';
    const GERMANY_MAP_URL = 'https://www.dwd.de/DWD/warnungen/warnapp_gemeinden/json/warnungen_gemeinde_map_de.png';

    /**
     * @inheritDoc
     */
    protected $maxLifetime = 600;

    /**
     * @inheritDoc
     */
    protected function rebuild(array $parameters)
    {
        $data = [
            'forestFireHazardIndexWBI' => '',
            'germanyMap' => '',
            'warnings' => []
        ];

        if (WEATHER_WARNING_ENABLE_FORESTFIREHAZARDINDEXWBI) {
            // load germany forest fire hazard index WBI map
            try {
                $request = new HTTPRequest(self::GERMANY_FORESTFIREHAZARDINDEXWBI_URL);
                $request->execute();
                $reply = $request->getReply();

                $data['forestFireHazardIndexWBI'] = "data:image/png;base64," . base64_encode($reply['body']);
            } catch (SystemException $e) {
                
            }
        }

        // load germany map
        try {
            $request = new HTTPRequest(self::GERMANY_MAP_URL);
            $request->execute();
            $reply = $request->getReply();

            $data['germanyMap'] = "data:image/png;base64," . base64_encode($reply['body']);
        } catch (SystemException $e) {
            
        }

        // load region warning information
        try {
            $request = new HTTPRequest(self::GERMANY_REGION_URL);
            $request->execute();

            $reply = $request->getReply()['body'];
            $reply = str_replace('warnWetter.loadWarnings(', '', $reply);
            $reply = mb_substr($reply, 0, -2);

            $data['warnings'] = $this->readWarnings(JSON::decode($reply)['warnings']);
            $this->sortWarnings($data['warnings']);
        } catch (SystemException $e) {
            
        }

        return $data;
    }

    /**
     * Reads the data from DWD and sorts them by region.
     * Returns a list by region.
     * 
     * @param   array   $warnings
     * @return  array
     */
    protected function readWarnings($warnings)
    {
        $list = [];
        if (empty($warnings)) return $list;

        foreach ($warnings as $warningDatas) {
            foreach ($warningDatas as $warning) {
                if (!isset($list[$warning['regionName']])) $list[$warning['regionName']] = [];

                $newEntry = [
                    'altitudeStart' => $warning['altitudeStart'],
                    'altitudeEnd' => $warning['altitudeEnd'],
                    'description' => $warning['description'],
                    'end' => ($warning['end'] / 1000),
                    'event' => $this->umlautsConvert($warning['event']),
                    'headline' => $warning['headline'],
                    'instruction' => $warning['instruction'],
                    'level' => $warning['level'],
                    'regionName' => $warning['regionName'],
                    'start' => ($warning['start'] / 1000),
                    'state' => $warning['state'],
                    'stateShort' => $warning['stateShort'],
                    'type' => $warning['type']
                ];

                $exist = false;
                foreach ($list[$warning['regionName']] as $entry) {
                    if (empty(array_diff($entry, $newEntry))) {
                        $exist = true;
                    }
                }

                if (!$exist) {
                    $list[$warning['regionName']][] = $newEntry;
                }
            }
        }

        return $list;
    }

    /**
     * Sorts the warnings by 'level', 'start' and 'end' per region area.
     * 
     * @param   array   $warnings
     */
    protected function sortWarnings(&$warnings)
    {
        foreach ($warnings as $regionName => $warningDatas) {
            $end = array_column($warningDatas, 'end');
            $level = array_column($warningDatas, 'level');
            $start = array_column($warningDatas, 'start');

            array_multisort($level, SORT_ASC, $start, SORT_ASC, $end, SORT_ASC, $warningDatas);
        }
    }

    /**
     * Converts umlauts and returns the changed value
     * 
     * @param   string    $value
     * @return  string
     */
    protected function umlautsConvert($value)
    {
        $value = strtolower($value);

        $search = array(" ", "ä", "Ä", "ö", "Ö", "ü", "Ü", "ß");
        $replace = array("_", "ae", "ae", "oe", "oe", "ue", "ue", "ss");
        $patched = str_replace($search, $replace, $value);

        return $patched;
    }

}