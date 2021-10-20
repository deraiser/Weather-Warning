/**
 * @author      Marco Daries, Alexander Langer (Source of ideas)
 * @copyright   2020 Daries.info
 * @license     Attribution-NoDerivatives 4.0 International (CC BY-ND 4.0) <https://creativecommons.org/licenses/by-nd/4.0/>
 * @module      Daries/WeatherWarning/Ui/Region/Search/Input
 */
define(["require", "exports", "tslib", "WoltLabSuite/Core/Core", "WoltLabSuite/Core/Ui/Search/Input"], function (require, exports, tslib_1, Core, Input_1) {
    "use strict";
    Core = tslib_1.__importStar(Core);
    Input_1 = tslib_1.__importDefault(Input_1);
    class UiWeatherWarningRegionSearchInput extends Input_1.default {
        constructor(element, options) {
            options = Core.extend({
                ajax: {
                    className: "wcf\\data\\weather\\warning\\region\\WeatherWarningRegionAction"
                }
            }, options);
            super(element, options);
        }
    }
    Core.enableLegacyInheritance(UiWeatherWarningRegionSearchInput);
    return UiWeatherWarningRegionSearchInput;
});