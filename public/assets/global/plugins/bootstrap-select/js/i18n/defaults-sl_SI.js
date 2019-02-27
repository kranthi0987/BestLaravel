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
            noneSelectedText: 'Nič izbranega',
            noneResultsText: 'Ni zadetkov za {0}',
            countSelectedText: function (numSelected, numTotal) {
                "Število izbranih: {0}";
            },
            maxOptionsText: function (numAll, numGroup) {
                return [
                    'Omejitev dosežena (max. izbranih: {n})',
                    'Omejitev skupine dosežena (max. izbranih: {n})'
                ];
            },
            selectAllText: 'Izberi vse',
            deselectAllText: 'Počisti izbor',
            multipleSeparator: ', '
        };
    })(jQuery);


}));
