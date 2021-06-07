<?php

namespace wcf\data\weather\warning\region;

use wcf\data\DatabaseObjectEditor;

/**
 * Provides functions to edit regions.
 * 
 * @author	Marco Daries, Alexander Langer (Source of ideas)
 * @copyright	2020 Daries.info
 * @license	Licence Deraiser Free <https://my-wsc.de/license-deraiser-free>
 * @package	WoltLabSuite\Core\Data\Weather\Warning\Region
 * 
 * @method static   WeatherWarningRegion    create(array $parameters = [])
 * @method          WeatherWarningRegion    getDecoratedObject()
 * @mixin           WeatherWarningRegion
 */
class WeatherWarningRegionEditor extends DatabaseObjectEditor {

    /**
     * @inheritDoc
     */
    protected static $baseClass = WeatherWarningRegion::class;

}