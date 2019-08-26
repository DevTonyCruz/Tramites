(function($) {

    'use strict';

    $(function() {

        const columns = [
            { name: 'id', data: 'id' },
            {
                name: 'nombre',
                render: function(data, type, row) {
                    var materno = '';
                    if (row.apmaterno != null) {
                        materno = row.apmaterno;
                    }
                    return row.nombre + ' ' + row.appaterno + ' ' + materno;
                }
            },
            {
                name: 'direccion',
                data: 'sepomex_id',
                render: function(data, type, row) {
                    var interior = '';
                    if (row.interior != null) {
                        interior = row.interior;
                    }

                    return row.direccion + ' ' + row.exterior + ' ' + interior + ', Col.' + row.sepomex.name;
                }
            },
            { name: 'telefono', data: 'telefono' },
            { name: 'distrito', data: 'distrito' },
            { name: 'cantidad', data: 'cantidad' },
            { name: 'gestion_id', data: 'gestion.nombre', defaultContent: "<i>--</i>" },
            {
                name: 'remitente_id',
                data: 'remitente.nombre',
                defaultContent: "<i>--</i>",
                render: function(data, type, row) {

                    if (row.gestion_id == null) {
                        return '<i>--</i>';
                    } else {
                        var materno = '';
                        if (row.remitente.apmaterno != null) {
                            materno = row.remitente.apmaterno;
                        }
                        return row.remitente.nombre + ' ' + row.remitente.appaterno + ' ' + materno;
                    }
                }
            },
            {
                name: 'estatus',
                data: 'estatus',
                defaultContent: "<i>--</i>",
                render: function(data, type, row) {

                    var badge_status = '';
                    switch (row.estatus) {
                        case 'Activo':
                            badge_status = 'success';
                            break;
                        case 'Cerrado':
                            badge_status = 'dark';
                            break;
                        case 'Por vencer':
                            badge_status = 'warning';
                            break;
                        case 'Vencido':
                            badge_status = 'danger';
                            break;
                        default:
                            badge_status = '';
                            break;
                    }

                    return `<span class="badge-text badge-text-small ` + badge_status + `">` + row.estatus + `</span> `;
                }
            },
            {
                name: 'fecha_ini',
                data: 'fecha_ini',
                render: function(data, type, row) {
                    var date = row.fecha_ini;
                    return date.substring(0, 10);
                }
            }, //
            {
                name: 'fecha_fin',
                data: 'fecha_fin',
                defaultContent: "<i>--</i>",
                render: function(data, type, row) {
                    var date = row.fecha_fin;
                    return date.substring(0, 10);
                }
            }, {
                name: 'actions',
                className: "td-actions",
                searchable: false,
                render: function(data, type, row) {
                    return ` <a href="` + URLAction + `/` + row.id + `" title="Editar"><i class="la la-edit edit"></i></a >
                        <a href="javascript:void(0)" onclick = "ObjectForms.FormsAddAction('form_delete', '` + URLAction + `/` + row.id + `');" title = "Eliminar" >
                        <i class = "la la-trash delete" > </i> </a>`
                }
            }, { data: 'nombre', visible: false }, { data: 'appaterno', visible: false }, { data: 'apmaterno', visible: false },
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
            },
            language: {
                sProcessing: "Procesando...",
                sLengthMenu: "Mostrar _MENU_ registros",
                sZeroRecords: "No se encontraron resultados",
                sEmptyTable: "Ningún dato disponible en esta tabla",
                sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
                sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
                sInfoPostFix: "",
                sSearch: "Buscar:",
                sUrl: "",
                sInfoThousands: ",",
                sLoadingRecords: "Cargando...",
                oPaginate: {
                    sFirst: "Primero",
                    sLast: "Último",
                    sNext: "Siguiente",
                    sPrevious: "Anterior"
                },
                oAria: {
                    sSortAscending: ": Activar para ordenar la columna de manera ascendente",
                    sSortDescending: ": Activar para ordenar la columna de manera descendente"
                }
            }
        });
    });

})(jQuery);