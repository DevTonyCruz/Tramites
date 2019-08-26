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


    if (typeof $.fn.dataTable !== 'undefined') {
        $('#datatable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
        });
    }

});

$('form').on('focus', 'input[type=number]', function(e) {
    $(this).on('mousewheel.disableScroll', function(e) {
        e.preventDefault()
    })
})
$('form').on('blur', 'input[type=number]', function(e) {
    $(this).off('mousewheel.disableScroll')
})

$('#select-all').click(function(event) {

    if (this.checked) {
        $(':checkbox').each(function() {
            this.checked = true;
        });
    } else {
        $(':checkbox').each(function() {
            this.checked = false;
        });
    }
});