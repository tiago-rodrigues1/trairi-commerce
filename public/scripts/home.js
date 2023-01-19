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
    
    $('#anunciante_cpf_cnpj').mask('000.000.000-000', options);

    $(".tipo_cadastro_input").change(function () {
        if ($(this).val() == "anunciante") {
            $("#camposAnunciante").show();
            $("#camposAnunciante").find('input').attr('required', 'required');
            $("#camposAnunciante").find('textarea').attr('required', 'required');
        } else {
            $("#camposAnunciante").find('input').removeAttr('required');
            $("#camposAnunciante").find('textarea').removeAttr('required');
            $("#camposAnunciante").hide();
        }
    });

    $('#cadastro').on('submit', function(e){
        e.preventDefault();
        
        $('#cep').unmask();
        $('#telefone').unmask();
        $('#anunciante_cep').unmask();
        $('#anunciante_telefone').unmask();
        $('#anunciante_cpf_cnpj').unmask();
        $(this).unbind('submit').submit();
    });
});