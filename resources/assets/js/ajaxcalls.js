/**
 * ajaxcalls.js
 *  ~ Handles ajax actions, calls to views and API data
 */

 /*jshint esversion: 6*/
 /* jshint strict: true */

(function () {
   'use strict';
    function DodajAjaxEvente() {
        $("a[data-ajax-request]").off().on('click', function (event) {
            $(this).attr("data-ajax-request", "executed");
            event.preventDefault();
            let action = $(this).attr("data-ajax-action"),
                href = $(this).attr("href"),
                target = $(this).attr("data-ajax-target"),
                method = $(this).attr('data-ajax-method'),
                hitThis;

            if (typeof action === 'string')
                hitThis = action;
            else
                hitThis = href;

            $.ajax({
                type: method,
                url: hitThis,
                async: true,
                success: function (data) {
                    $("#" + target).html(data);
                }
            });
        });

        $("form[ajax-poziv='da']").submit(function (event) {
            $(this).attr("ajax-poziv", "dodan");
            event.preventDefault();
            var urlZaPoziv1 = $(this).attr("ajax-url");
            var urlZaPoziv2 = $(this).attr("action");
            var divZaRezultat = $(this).attr("ajax-rezultat");

            var urlZaPoziv;
            if (urlZaPoziv1 instanceof String)
                urlZaPoziv = urlZaPoziv1;
            else
                urlZaPoziv = urlZaPoziv2;

            var form = $(this);

            $.ajax({
                type: "POST",
                url: urlZaPoziv,
                data: form.serialize(),
                success: function (data) {
                    $("#" + divZaRezultat).html(data);
                }
            });
        });
    }

    function DodajAjaxLoadere() {
        $("div[data-ajax-onload]").each(function () {
            $(this).attr("data-ajax-onload", "executed");
            let action = $(this).attr("data-ajax-action"),
                target = $(this).attr("data-ajax-target"),
                method = $(this).attr('data-ajax-method'),
                hitThis;
            if (typeof action === 'string')
                hitThis = action;

            $.ajax({
                type: method,
                url: hitThis,
                async: true,
                success: function (data) {
                    $("#" + target).html(data);
                }
            });
        });
    }

    $(document).ready(function () {
        // izvršava nakon što glavni html dokument bude generisan
        DodajAjaxEvente();
        DodajAjaxLoadere();
    });

    $(document).ajaxComplete(function () {
        // izvršava nakon bilo kojeg ajax poziva
        DodajAjaxEvente();
    });

}()); //Strict
