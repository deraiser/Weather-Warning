<?php

namespace wcf\system\box;

use wcf\system\cache\builder\WeatherWarningCacheBuilder;
use wcf\system\WCF;

/**
 * Box that shows the german grassland fire index map.
 * 
 * @author      Marco Daries, Alexander Langer (Source of ideas)
 * @copyright   2020 Daries.info
 * @license     Attribution-NoDerivatives 4.0 International (CC BY-ND 4.0) <https://creativecommons.org/licenses/by-nd/4.0/>
 * @package     WoltLabSuite\Core\System\Box
 */
class WeatherWarningGrasslandFireIndexGermanyBoxController extends AbstractBoxController
{

    /**
     * @inheritDoc
     */
    protected function loadContent()
    {
        if (MODULE_WEATHER_WARNING && WEATHER_WARNING_ENABLE_GRASSLANDFIREINDEX) {
            if (WCF::getUser()->userID && !WCF::getUser()->getUserOption('weatherWarningGrasslandFireIndexGermanyEnable')) return;

            $data = [
                'grasslandFireIndexMap' => WeatherWarningCacheBuilder::getInstance()->getData([], 'grasslandFireIndex')
            ];

            $this->content = WCF::getTPL()->fetch('boxWeatherWarningGrasslandFireIndexGermany', 'wcf', $data, true);
        }
    }

}