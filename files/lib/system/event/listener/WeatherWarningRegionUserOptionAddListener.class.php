<?php

namespace wcf\system\event\listener;

use wcf\acp\form\UserOptionAddForm;

/**
 * Inserts 'weatherWarningRegion' in the available option types of user option
 * 
 * @author      Marco Daries, Alexander Langer (Source of ideas)
 * @copyright   2020 Daries.info
 * @license     Attribution-NoDerivatives 4.0 International (CC BY-ND 4.0) <https://creativecommons.org/licenses/by-nd/4.0/>
 * @package     WoltLabSuite\Core\System\Event\Listener
 */
class WeatherWarningRegionUserOptionAddListener implements IParameterizedEventListener
{

    /**
     * @inheritDoc
     */
    public function execute($eventObj, $className, $eventName, array &$parameters)
    {
        UserOptionAddForm::$availableOptionTypes[] = 'weatherWarningRegion';
    }

}