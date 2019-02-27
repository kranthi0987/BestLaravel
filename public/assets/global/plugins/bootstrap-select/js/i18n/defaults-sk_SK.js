/*
 * Copyright (c) 2019. 
 * sanjay kranthi  kranthi0987@gmail.com
 */

(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        // AMD. Register as an anonymous module unless amdModuleId is set
        define(["jquery"], function (a0) {
            return (factory(a0));
        });
    } else if (typeof exports === 'object') {
        // Node. Does not work with strict CommonJS, but
        // only CommonJS-like environments that support module.exports,
        // like Node.
        module.exports = factory(require("jquery"));
    } else {
        factory(jQuery);
    }
}(this, function (jQuery) {

    (function ($) {
        $.fn.selectpicker.defaults = {
            noneSelectedText: 'Vyberte zo zoznamu',
            noneResultsText: 'Pre výraz {0} neboli nájdené žiadne výsledky',
            countSelectedText: 'Vybrané {0} z {1}',
            maxOptionsText: ['Limit prekročený ({n} {var} max)', 'Limit skupiny prekročený ({n} {var} max)', ['položiek', 'položka']],
            selectAllText: 'Vybrať všetky',
            deselectAllText: 'Zrušiť výber',
            multipleSeparator: ', '
        };
    })(jQuery);


}));