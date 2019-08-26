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
            { name: 'politico', data: 'politico' },
            {
                name: 'profesion',
                render: function(data, type, row) {
                    var profesion = 'No aplica';

                    if (row.profesion != null) {
                        profesion = row.profesion.nombre;
                    }
                    return profesion;
                }
            },
            {
                name: 'grupo',
                render: function(data, type, row) {
                    var grupo = 'No aplica';

                    if (row.grupos != null) {
                        grupo = row.grupos.nombre;
                    }
                    return grupo;
                }
            },
            {
                name: 'actions',
                className: "td-actions",
                searchable: false,
                render: function(data, type, row) {
                    return ` <a href="` + URLAction + `/` + row.id + `" title="Editar"><i class="la la-edit edit"></i></a >
                        <a href="javascript:void(0)" onclick = "ObjectForms.FormsAddAction('form_delete', '` + URLAction + `/` + row.id + `');" title = "Eliminar" >
                        <i class = "la la-trash delete" > </i> </a>`
                }
            },
            /*{
                name: 'profesion',
                data: 'profesion',
                defaultContent: "<i>--</i>"
            },
            {
                name: 'grupo',
                data: 'grupo'
            },
            {
                name: 'politico',
                data: 'politico',
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
            },*/
            { data: 'nombre', visible: false }, { data: 'appaterno', visible: false }, { data: 'apmaterno', visible: false },
        ];

        $('#directorio-list').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: URLList,
            columns: columns,
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