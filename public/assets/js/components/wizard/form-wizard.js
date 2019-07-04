$(function() {
    $("#rootwizard").bootstrapWizard({
        onTabShow: function(f, a, d) {
            var c = a.find("li").length;
            var e = d + 1;
            var b = (e / c) * 100;

            console.log(a);
            $("#rootwizard .progressbar").css({
                width: b + "%"
            })
        },
        onNext: function(tab, navigation, index) {
            console.log(navigation);
            switch (index) {
                case 1:
                    TramitesObject.TramiteBeneficiario(navigation, index);
                    break;
            }
        }
    });

    $("#rootwizard .finish").click(function() {
        $("#success-modal").modal()
    })
});