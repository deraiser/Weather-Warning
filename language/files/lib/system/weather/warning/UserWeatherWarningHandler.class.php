<?php

namespace wcf\system\weather\warning;

use wcf\system\cache\builder\WeatherWarningCacheBuilder;
use wcf\system\event\EventHandler;
use wcf\system\SingletonFactory;
use wcf\system\WCF;

/**
 * @author	Marco Daries, Alexander Langer (Source of ideas)
 * @copyright	2020 Daries.info
 * @license	Licence Deraiser Free <https://my-wsc.de/license-deraiser-free>
 * @package	WoltLabSuite\Core\System\Weather\Warning
 */
class UserWeatherWarningHandler extends SingletonFactory {

    /**
     * region
     * @var string
     */
    protected $region = '';

    /**
     * All weather warnings from DWD.
     * @var array
     */
    protected $warnings = [];

    /**
     * Returns the current region.
     *
     * @return  string
     */
    public function getRegion() {
        return $this->region;
    }

    /**
     * Returns the weather warnings for the current region.
     *
     * @return  array
     */
    public function getWarnings() {
        if (isset($this->warnings[$this->getRegion()])) return $this->warnings[$this->getRegion()];
        return [];
    }

    /**
     * Returns false if has no warnings.
     *
     * @return  boolean
     */
    public function hasWarnings() {
        return !empty($this->getWarnings());
    }

    /**
     * @inheritDoc
     */
    protected function init() {
        if (MODULE_WEATHER_WARNING) {
            $this->warnings = WeatherWarningCacheBuilder::getInstance()->getData([], 'warnings');

            $this->setRegion(WEATHER_WARNING_DEFAULT_REGION);

            if (WCF::getUser()->userID) {
                $region = WCF::getUser()->getUserOption('weatherWarningRegion');

                if ($region !== null && !empty($region)) {
                    $this->setRegion($region);
                }
            }

            EventHandler::getInstance()->fireAction($this, 'init');
        }
    }

    /**
     * Sets the region
     * 
     * @param   string  $region
     */
    public function setRegion($region) {
        $this->region = $region;
    }

}