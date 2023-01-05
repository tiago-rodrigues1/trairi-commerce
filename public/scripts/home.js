$(document).ready(function () {
    $('#cadastro').hide();

    $('.trocar').click(function () {
        var id = $(this).data('id');

        if (id == "login") {
            $('#cadastro').hide();
            $('#login').fadeIn();
        } else {
            $('#login').hide();
            $('#cadastro').fadeIn();
        }
    });

    var options = {
        onKeyPress: function (cpf, ev, el, op) {
            var masks = ['000.000.000-000', '00.000.000/0000-00'],
                mask = (cpf.length > 14) ? masks[1] : masks[0];
            el.mask(mask, op);
        }
    }
    
    $('#cpf_cnpj').mask('000.000.000-000', options);

    $(".tipo_cadastro_input").change(function () {
        if ($(this).val() == "anunciante") {
            $("#camposAnunciante").show();
        } else {
            $("#camposAnunciante").hide();
        }
    });
});