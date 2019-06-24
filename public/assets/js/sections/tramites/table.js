(function($) {

    'use strict';

    $(function() {

        const columns = [
            { name: 'id', data: 'id' },
            { name: 'name', data: 'fullname' },
            { name: 'email', data: 'email' },
            { name: 'phone', data: 'phone' },
            {
                name: 'actions',
                className: "td-actions",
                searchable: false,
                render: function(data, type, row) {
                    return `
                <a href="` + URLAction + `/` + row.id + `" title="Editar"> <i class="la la-edit edit"></i></a>
                <a href="javascript:void(0)" onclick="ObjectForms.FormsAddAction('form_delete', '` + URLAction + `/` + row.id + `');" title="Eliminar">
                    <i class="la la-trash delete"></i>
                </a>`
                }
            }
        ];

        const buttons = [{
            extend: 'copy',
            text: 'Copiar',
            title: $('h1').text(),
            exportOptions: {
                columns: ':not(.no-print)'
            },
            footer: true
        }, {
            extend: 'excel',
            text: 'Excel',
            title: $('h1').text(),
            exportOptions: {
                columns: ':not(.no-print)'
            },
            footer: true
        }, {
            extend: 'csv',
            text: 'Csv',
            title: $('h1').text(),
            exportOptions: {
                columns: ':not(.no-print)'
            },
            footer: true
        }, {
            extend: 'pdf',
            text: 'Pdf',
            title: $('h1').text(),
            exportOptions: {
                columns: ':not(.no-print)'
            },
            footer: true
        }, {
            extend: 'print',
            text: 'Imprimir',
            title: $('h1').text(),
            exportOptions: {
                columns: ':not(.no-print)'
            },
            footer: true,
            autoPrint: true
        }, {
            text: 'Nuevo',
            title: $('h1').text(),
            action: function() {
                window.location.href = URLNew;
            },
            className: 'btn btn-success',
            footer: true
        }];

        $('#tramites-list').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: URLList,
            columns: columns,
            dom: 'Bfrtip',
            buttons: {
                buttons: buttons,
                dom: {
                    container: {
                        className: 'dt-buttons'
                    },
                    button: {
                        className: 'btn btn-primary'
                    }
                }
            }
        });
    });

})(jQuery);