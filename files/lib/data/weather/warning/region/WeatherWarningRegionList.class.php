<?php

namespace wcf\data\weather\warning\region;

use wcf\data\DatabaseObjectList;

/**
 * Represents a list of regions.
 * 
 * @author      Marco Daries, Alexander Langer (Source of ideas)
 * @copyright   2020 Daries.info
 * @license     Attribution-NoDerivatives 4.0 International (CC BY-ND 4.0) <https://creativecommons.org/licenses/by-nd/4.0/>
 * @package     WoltLabSuite\Core\Data\Weather\Warning\Region
 *
 * @method      WeatherWarningRegion        current()
 * @method      WeatherWarningRegion[]      getObjects()
 * @method      WeatherWarningRegion|null   search($objectID)
 * @property    WeatherWarningRegion[]      $objects
 */
class WeatherWarningRegionList extends DatabaseObjectList
{

    /**
     * @inheritDoc
     */
    public $className = WeatherWarningRegion::class;

}