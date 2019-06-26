"use strict"

let URL_WEB = document.location.origin;
let PATH_WEB = window.location.pathname;
let local_uuid = "";

$(document).ready(function() {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

});