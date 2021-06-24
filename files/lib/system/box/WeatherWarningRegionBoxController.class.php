<?php

namespace wcf\system\box;

use wcf\system\WCF;
use wcf\system\weather\warning\UserWeatherWarningHandler;

/**
 * Box that shows the region warning weather information.
 * 
 * @author	Marco Daries, Alexander Langer (Source of ideas)
 * @copyright	2020 Daries.info
 * @license	Licence Deraiser Free <https://my-wsc.de/license-deraiser-free>
 * @package	WoltLabSuite\Core\System\Box
 */
class WeatherWarningRegionBoxController extends AbstractBoxController {

    /**
     * @inheritDoc
     */
    protected static $supportedPositions = ['sidebarLeft', 'sidebarRight'];

    /**
     * @inheritDoc
     */
    protected function loadContent() {
        if (MODULE_WEATHER_WARNING) {
            if (!WCF::getUser()->userID && empty(UserWeatherWarningHandler::getInstance()->getRegion())) return;
            
            if (WCF::getUser()->userID) {
                $regionEnable = WCF::getUser()->getUserOption('weatherWarningRegionEnable');
                if (!$regionEnable) return;
            }

            $this->content = WCF::getTPL()->fetch(
                    'boxWeatherWarningRegion',
                    'wcf',
                    [
                        'region' => UserWeatherWarningHandler::getInstance()->getRegion(),
                        'warnings' => UserWeatherWarningHandler::getInstance()->getWarnings()
                    ],
                    true
            );
        }
    }

}