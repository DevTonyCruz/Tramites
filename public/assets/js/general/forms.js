const ObjectForms = {
    FormsAddAction: function(form, action) {
        $('#' + form).attr('action', action);

        var opcion = confirm("¿Está seguro de eliminar este elemento?");
        if (opcion == true) {
            $('#' + form).submit();
        }
    },
}