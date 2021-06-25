/**
 * @author	Marco Daries, Alexander Langer (Source of ideas)
 * @copyright	2020 Daries.info
 * @license	Attribution-NoDerivatives 4.0 International (CC BY-ND 4.0) <https://creativecommons.org/licenses/by-nd/4.0/>
 * @module	Daries/WeatherWarning/Ui/Region/Search/Input
 */
define(['Core', 'WoltLabSuite/Core/Ui/Search/Input'], function (Core, UiSearchInput) {
    "use strict";

    /**
     * @param       {Element}       element     input element
     * @param       {Object=}       options     search options and settings
     * @constructor
     */
    function UiWeatherWarningRegionSearchInput(element, options) {
        this.init(element, options);
    }
    Core.inherit(UiWeatherWarningRegionSearchInput, UiSearchInput, {
        init: function (element, options) {
            options = Core.extend({
                ajax: {
                    className: 'wcf\\data\\weather\\warning\\region\\WeatherWarningRegionAction'
                }
            }, options);

            UiWeatherWarningRegionSearchInput._super.prototype.init.call(this, element, options);
        }
    });

    return UiWeatherWarningRegionSearchInput;
});
