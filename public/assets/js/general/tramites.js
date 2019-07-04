"use strict"

const TramitesObject = {
    TramiteBeneficiario: function() {

        var form = $("#form-beneficiario").serialize();

        RequestObject.AjaxJson('POST', 'tramites/beneficiario', form).then(
            function(response) {

                console.log(response);

            },
            function(xhrObj, textStatus, err) {
                console.log(err);
            });


    },
};