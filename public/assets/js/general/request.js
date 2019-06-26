"use strict"

const RequestObject = {
    AjaxJson: function(method, url, data = null) {

        let paramResponse =

            $.ajax({
                method: method,
                url: URL_WEB + '/' + url,
                dataType: 'json',
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
                data: data
            })
            .done(function(data) {
                return data;
            })
            .fail(function(jqXHR, error, errorThrown) {
                return jqXHR;
            });

        return paramResponse;

    },

    AjaxSimple: function(method, url, data) {

        let paramResponse =

            $.ajax({
                method: method,
                url: URL_WEB + '/' + url,
                data: data,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                },
            })
            .done(function(data) {
                return data;
            })
            .fail(function(jqXHR, error, errorThrown) {
                return jqXHR;
            });

        return paramResponse;

    }

}