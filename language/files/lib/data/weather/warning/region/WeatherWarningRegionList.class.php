<?php

namespace wcf\data\weather\warning\region;

use wcf\data\DatabaseObjectList;

/**
 * Represents a list of regions.
 * 
 * @author	Marco Daries, Alexander Langer (Source of ideas)
 * @copyright	2020 Daries.info
 * @license	Licence Deraiser Free <https://my-wsc.de/license-deraiser-free>
 * @package	WoltLabSuite\Core\Data\Weather\Warning\Region
 *
 * @method      WeatherWarningRegion        current()
 * @method      WeatherWarningRegion[]      getObjects()
 * @method      WeatherWarningRegion|null   search($objectID)
 * @property    WeatherWarningRegion[]      $objects
 */
class WeatherWarningRegionList extends DatabaseObjectList {

    /**
     * @inheritDoc
     */
    public $className = WeatherWarningRegion::class;

}