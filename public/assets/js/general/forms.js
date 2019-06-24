const ObjectForms = {
    FormsAddAction: function(form, action) {
        $('#' + form).attr('action', action);
        $('#' + form).submit();
    },
}