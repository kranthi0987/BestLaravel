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
            noneSelectedText: 'Nenhum seleccionado',
            noneResultsText: 'Sem resultados contendo {0}',
            countSelectedText: 'Selecionado {0} de {1}',
            maxOptionsText: ['Limite ultrapassado (máx. {n} {var})', 'Limite de seleções ultrapassado (máx. {n} {var})', ['itens', 'item']],
            multipleSeparator: ', '
        };
    })(jQuery);


}));