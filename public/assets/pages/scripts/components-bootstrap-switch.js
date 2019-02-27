/*
 * Copyright (c) 2019. 
 * sanjay kranthi  kranthi0987@gmail.com
 */

var ComponentsBootstrapSwitch = function () {

    var handleBootstrapSwitch = function () {

        $('.switch-radio1').on('switch-change', function () {
            $('.switch-radio1').bootstrapSwitch('toggleRadioState');
        });

        // or
        $('.switch-radio1').on('switch-change', function () {
            $('.switch-radio1').bootstrapSwitch('toggleRadioStateAllowUncheck');
        });

        // or
        $('.switch-radio1').on('switch-change', function () {
            $('.switch-radio1').bootstrapSwitch('toggleRadioStateAllowUncheck', false);
        });

    }

    return {
        //main function to initiate the module
        init: function () {
            handleBootstrapSwitch();
        }
    };

}();

jQuery(document).ready(function () {
    ComponentsBootstrapSwitch.init();
});
