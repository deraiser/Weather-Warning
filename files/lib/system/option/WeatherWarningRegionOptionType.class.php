<?php

namespace wcf\system\option;

use wcf\data\option\Option;
use wcf\data\weather\warning\region\WeatherWarningRegionList;
use wcf\system\exception\UserInputException;
use wcf\system\WCF;

/**
 * Option type implementation for region input fields.
 * 
 * @author	Marco Daries, Alexander Langer (Source of ideas)
 * @copyright	2020 Daries.info
 * @license	Attribution-NoDerivatives 4.0 International (CC BY-ND 4.0) <https://creativecommons.org/licenses/by-nd/4.0/>
 * @package	WoltLabSuite\Core\System\Option
 */
class WeatherWarningRegionOptionType extends TextOptionType {

    /**
     * @inheritDoc
     */
    public function getFormElement(Option $option, $value) {
        WCF::getTPL()->assign([
            'option' => $option,
            'inputType' => $this->inputType,
            'inputClass' => $this->inputClass,
            'value' => $value
        ]);
        return WCF::getTPL()->fetch('weatherWarningRegionOptionType');
    }

    /**
     * @inheritDoc
     */
    public function validate(Option $option, $newValue) {
        if (!empty($newValue)) {
            $regionList = new WeatherWarningRegionList();
            $regionList->getConditionBuilder()->add('regionName = ?', [$newValue]);
            $count = $regionList->countObjects();

            if (!$count) {
                throw new UserInputException($option->optionName, 'noExist');
            }
        }
    }

}