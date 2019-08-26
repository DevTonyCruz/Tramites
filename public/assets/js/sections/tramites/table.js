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
                    if(row.fecha_fin != null){
                        return date.substring(0, 10);
                    }
                    return '--';
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

        $('#tramites-list').DataTable({
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