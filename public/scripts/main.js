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

    $('.tipo_cadastro_input').change(function () {
        if ($(this).val() == "anunciante") {
            $('#camposAnunciante').show();
            $('#camposAnunciante').find('input:not([type=checkbox])').attr('required', 'required');
            $('#camposAnunciante').find('textarea').attr('required', 'required');
        } else {
            $('#camposAnunciante').find('input').removeAttr('required');
            $('#camposAnunciante').find('textarea').removeAttr('required');
            $('#camposAnunciante').hide();
        }
    });

    $('#login').submit(function() {
        $(this).find('button[type=submit]').attr('disabled', 'disabled').html(`
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Aguarde...
        `);
    });

    $('#cadastro, #perfilform').on('submit', function(e){
        e.preventDefault();
        
        $('#cep').unmask();
        $('#telefone').unmask();
        $('#anunciante_cep').unmask();
        $('#anunciante_telefone').unmask();
        $('#anunciante_cpf_cnpj').unmask();

        $(this).find('button[type=submit]').attr('disabled', 'disabled').html(`
        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
        Cadastrando...
        `);
        
        $(this).unbind('submit').submit();
    });

    $('.showPassword').click(function() {
        var targetInput = $(this).data('target');
        
        var newType = "";

        if ($(targetInput).attr('type') == "text") {
            newType = "password";
        } else {
            newType = "text";
        }

        $(targetInput).attr('type', newType);
        $(this).children().toggle("fast");
    });


    $('.cep').focusout(function() {
        var inputId = $(this).attr('id');
        var cep = $(this).val();
        var apiUrl = `https://brasilapi.com.br/api/cep/v1/${cep}`;

        $.ajax({
            url: apiUrl,
            dataType: "json",
            success: function(data) {
                if (inputId == "cep") {
                    $('#cidade').val(data.city);
                    $('#bairro').val(data.neighborhood || "");
                    $('#endereco').val(data.street || "");
                } else if (inputId == "anunciante_cep") {
                    $('#anunciante_cidade').val(data.city);
                    $('#anunciante_bairro').val(data.neighborhood || "");
                    $('#anunciante_endereco').val(data.street || "");
                }
            }
        });
    });

    $('.open').click(function() {
        var id = $(this).data('produto_id');
        var url = `/produtos/detalhar/${id}`;

        $.get(url, function(data) {
            $('body').append(data);
            $(`#detalheProduto_${id}`).show();

            $('.close').click(function() {
                var target = $(this).data('target');

                $(target).remove();
            });
        });
    });
});