/*
 * Copyright (c) 2019. 
 * sanjay kranthi  kranthi0987@gmail.com
 */

var ComponentsKnobDials = function () {

    return {
        //main function to initiate the module

        init: function () {
            //knob does not support ie8 so skip it
            if (!jQuery().knob || App.isIE8()) {
                return;
            }

            // general knob
            $(".knob").knob({
                'dynamicDraw': true,
                'thickness': 0.2,
                'tickColorizeValues': true,
                'skin': 'tron'
            });
        }

    };

}();

jQuery(document).ready(function () {
    ComponentsKnobDials.init();
});
