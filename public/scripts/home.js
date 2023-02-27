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
            $('#camposAnunciante').find('input:not(type=checkbox)').attr('required', 'required');
            $('#camposAnunciante').find('textarea').attr('required', 'required');
        } else {
            $('#camposAnunciante').find('input').removeAttr('required');
            $('#camposAnunciante').find('textarea').removeAttr('required');
            $('#camposAnunciante').hide();
        }
    });

    $('#login, #adicionarProduto').submit(function() {

        $('#valor').mask({reverse:true});
        $('#taxa_entrega').mask({reverse:true});

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

    let cont = 0;
    $('.add').click(function() {

        if (cont < 4) {
            $('.fileInputs-container').append(
                `
                <div class="mt-3 d-flex align-items-center gap-2 position-relative" id="divinpt_${++cont}">
                    <input type="file" class="form-control" name="imagens[]" id="inpt_${cont}">
                    <button type="button" class="remove btn ps-2 border-0 position-absolute top-50 start-100 translate-middle-y" data-target="#divinpt_${cont}">
                        <img src="/icons/x.svg" alt="Ícone de X vermelho, que representa remoção de imagem">
                    </button>
                </div>
                `
            );

            console.log(cont)
        }

        $('.remove').click(function() {
            var idToRemove = $(this).data('target');
    
            $(idToRemove).remove();
        });
    });

    $('.allow-edit').click(function() {
        var form = $(this).data('formtarget');

        $(`${form} input[readonly], textarea`).removeAttr('readonly');
        $(`${form} input[type=radio], input[type=checkbox]`).removeAttr('disabled');
        $(form).append(`
            <button type="submit" class="btn tc-btn mt-3">Salvar</button>
            <a class="btn tc-btn-ghost-red" href="/usuario/perfil">Cancelar</button>
        `);
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

    $('.quant_item').change(function() {
        if ($(this).val() < 1) {
            $(this).val(1);
        }

        var subtotal = 0;

        $('.quant_item').each(function() {
            subtotal += $(this).data('price') * Number($(this).val());
        });

        $('#subtotal').text(subtotal.toFixed(2).replace('.', ','));
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