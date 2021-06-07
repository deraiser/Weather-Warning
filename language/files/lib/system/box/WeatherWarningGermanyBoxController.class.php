<?php

namespace wcf\system\box;

use wcf\system\cache\builder\WeatherWarningCacheBuilder;
use wcf\system\WCF;

/**
 * Box that shows the german warning weather map.
 * 
 * @author	Marco Daries, Alexander Langer (Source of ideas)
 * @copyright	2020 Daries.info
 * @license	Licence Deraiser Free <https://my-wsc.de/license-deraiser-free>
 * @package	WoltLabSuite\Core\System\Box
 */
class WeatherWarningGermanyBoxController extends AbstractBoxController {

    /**
     * @inheritDoc
     */
    protected static $supportedPositions = ['sidebarLeft', 'sidebarRight'];

    /**
     * @inheritDoc
     */
    protected function loadContent() {
        if (MODULE_WEATHER_WARNING) {
            $data = [
                'germanyMap' => WeatherWarningCacheBuilder::getInstance()->getData([], 'germanyMap'),
                'germanyMapInfo' => WCF::getPath() . 'images/weather/germanyMapInfo.png'
            ];

            $this->content = WCF::getTPL()->fetch('boxWeatherWarningGermany', 'wcf', $data, true);
        }
    }

}