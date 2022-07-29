<?php

namespace wcf\data\weather\warning\region;

use wcf\data\DatabaseObjectEditor;

/**
 * Provides functions to edit regions.
 * 
 * @author      Marco Daries, Alexander Langer (Source of ideas)
 * @copyright   2020-2022 Daries.info
 * @license     Attribution-NoDerivatives 4.0 International (CC BY-ND 4.0) <https://creativecommons.org/licenses/by-nd/4.0/>
 * @package     WoltLabSuite\Core\Data\Weather\Warning\Region
 * 
 * @method static   WeatherWarningRegion    create(array $parameters = [])
 * @method          WeatherWarningRegion    getDecoratedObject()
 * @mixin           WeatherWarningRegion
 */
class WeatherWarningRegionEditor extends DatabaseObjectEditor
{

    /**
     * @inheritDoc
     */
    protected static $baseClass = WeatherWarningRegion::class;

}