/*
 * Copyright (c) 2019. 
 * sanjay kranthi  kranthi0987@gmail.com
 */

/**
 Cookie consent init
 **/

var CookieConsent = function () {

    var _init = function () {
        $('.mt-cookie-consent-bar').cookieBar({
            closeButton: '.mt-cookie-consent-btn'
        });
    };

    return {
        init: function () {
            _init();
        }
    };

}();

if (App.isAngularJsApp() === false) {
    jQuery(document).ready(function () {
        CookieConsent.init();
    });
}
