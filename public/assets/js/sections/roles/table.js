(function($) {

    'use strict';

    $(function() {

        const columns = [
            { name: 'id', data: 'id' },
            { name: 'name', data: 'name' },
            { name: 'description', data: 'description' },
            {
                name: 'actions',
                className: "td-actions",
                searchable: false,
                render: function(data, type, row) {
                    return `
                        <a href="` + URLAction + `/` + row.id + `" title="Editar"> <i class="la la-edit edit"></i></a>
                        <a href="javascript:void(0)" onclick="ObjectForms.FormsAddAction('form_delete', '` + URLAction + `/` + row.id + `');" title="Eliminar">
                            <i class="la la-trash delete"></i>
                        </a>
                        <a href="` + URLPermission + `/` + row.id + `" title="Permisos"> <i class="la la-lock more"></i></a>`
                }
            }
        ];

        $('#roles-list').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            ajax: URLList,
            columns: columns,
        });
    });

})(jQuery);
