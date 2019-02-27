/*
 * Copyright (c) 2019.
 * sanjay kranthi  kranthi0987@gmail.com
 */

!function ($) {

    var WinReszier = (function () {
        var registered = [];
        var inited = false;
        var timer;
        var resize = function (ev) {
            clearTimeout(timer);
            timer = setTimeout(notify, 100);
        };
        var notify = function () {
            for (var i = 0, cnt = registered.length; i < cnt; i++) {
                registered[i].apply();
            }
        };
        return {
            register: function (fn) {
                registered.push(fn);
                if (inited === false) {
                    $(window).bind('resize', resize);
                    inited = true;
                }
            },
            unregister: function (fn) {
                for (var i = 0, cnt = registered.length; i < cnt; i++) {
                    if (registered[i] == fn) {
                        delete registered[i];
                        break;
                    }
                }
            }
        }
    }());

    var TabDrop = function (element, options) {
        this.element = $(element);
        this.dropdown = $('<li class="dropdown hide pull-right tabdrop"><a class="dropdown-toggle" data-toggle="dropdown" href="#">' + options.text + ' <b class="caret"></b></a><ul class="dropdown-menu"></ul></li>')
            .prependTo(this.element);
        if (this.element.parent().is('.tabs-below')) {
            this.dropdown.addClass('dropup');
        }
        WinReszier.register($.proxy(this.layout, this));
        this.layout();
    };

    TabDrop.prototype = {
        constructor: TabDrop,

        layout: function () {
            var collection = [];
            this.dropdown.removeClass('hide');
            this.element
                .append(this.dropdown.find('li'))
                .find('>li')
                .not('.tabdrop')
                .each(function () {
                    if (this.offsetTop > 0) {
                        collection.push(this);
                    }
                });
            if (collection.length > 0) {
                collection = $(collection);
                this.dropdown
                    .find('ul')
                    .empty()
                    .append(collection);
                if (this.dropdown.find('.active').length == 1) {
                    this.dropdown.addClass('active');
                } else {
                    this.dropdown.removeClass('active');
                }
            } else {
                this.dropdown.addClass('hide');
            }
        }
    };

    $.fn.tabdrop = function (option) {
        return this.each(function () {
            var $this = $(this),
                data = $this.data('tabdrop'),
                options = typeof option === 'object' && option;
            if (!data) {
                $this.data('tabdrop', (data = new TabDrop(this, $.extend({}, $.fn.tabdrop.defaults, options))));
            }
            if (typeof option == 'string') {
                data[option]();
            }
        })
    };

    $.fn.tabdrop.defaults = {
        text: '<i class="icon-align-justify"></i>'
    };

    $.fn.tabdrop.Constructor = TabDrop;

}(window.jQuery);
