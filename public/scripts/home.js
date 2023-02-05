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
            $('#camposAnunciante').find('input').attr('required', 'required');
            $('#camposAnunciante').find('textarea').attr('required', 'required');
        } else {
            $('#camposAnunciante').find('input').removeAttr('required');
            $('#camposAnunciante').find('textarea').removeAttr('required');
            $('#camposAnunciante').hide();
        }
    });

    $('#cadastro').on('submit', function(e){
        e.preventDefault();
        
        $('#cep').unmask();
        $('#telefone').unmask();
        $('#anunciante_cep').unmask();
        $('#anunciante_telefone').unmask();
        $('#anunciante_cpf_cnpj').unmask();

        $(this).find('button[type=submit]').attr('disabled', 'disabled').html('Aguarde...');
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

    $('.add').click(function() {
        let cont = 0;

        $('.fileInputs-container').append(
            `
            <div class="mt-3 d-flex align-items-center gap-2 position-relative" id="inpt_${++cont}">
                <input type="file" class="form-control" name="imagens">
                <button type="button" class="remove btn ps-2 border-0 position-absolute top-50 start-100 translate-middle-y" data-target="#inpt_${cont}">
                    <img src="/icons/x.svg" alt="Ícone de X vermelho, que representa remoção de imagem">
                </button>
            </div>
            `
        );

        $('.remove').click(function() {
            var idToRemove = $(this).data('target');
    
            $(idToRemove).remove();
        });
    });

    $('.allow-edit').click(function() {
        var form = $(this).data('formtarget');

        $(`${form} input[readonly]`).removeAttr('readonly');
    });
});