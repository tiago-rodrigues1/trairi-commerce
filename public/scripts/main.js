function isAnuncianteChecked(el) {
    if (el.val() == "anunciante" && el.is(':checked')) {
        console.log("anunciante");
        $('#camposAnunciante').show();
        $('#camposAnunciante').find('input:not([type=checkbox]) input:not(.input-canal)').attr('required', 'required');
        $('#camposAnunciante').find('textarea').attr('required', 'required');
    } else {
        $('#camposAnunciante').find('input').removeAttr('required');
        $('#camposAnunciante').find('textarea').removeAttr('required');
        $('#camposAnunciante').hide();
    }
}

function editarComentarioHandler(event) {
    let target = event.target.getAttribute('data-target_coment');
    let originalComent = $(target).val();
    let comentHeader = $('.coment-header');

    $(comentHeader).addClass('d-none');

    $(target).removeAttr('disabled').focus().after(`
        <div class="mt-3 d-flex gap-3 align-self-end coment-controls">
            <button type="button" class="cancel-coment btn btn-sm text-tc-green">Cancelar</button>
            <button  type="button"class="save-coment btn btn-sm tc-btn">Salvar</button>
        </div>
    `);

    $('.cancel-coment').click(function() {
        $(target).val(originalComent);
        $(target).attr('disabled', 'true');
        $(comentHeader).removeClass('d-none');
        $('.coment-controls').remove();
    });

    $('.save-coment').click(function() {
        let comentario = $(target).val();
        let [, tipoComentario, , comentario_id] = target.split('_');

        $.ajax({
            url: `/${tipoComentario}/comentarios/${comentario_id}/editar`,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                comentario
            },
            success: function() {
                window.location.reload();
            }
        });
    });
}

function closeHandler(event) {
    let target = event.target.getAttribute('data-target');

    $(target).remove();
}

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
    $('#perfil_anunciante_cpf_cnpj').mask('000.000.000-000', options);

    isAnuncianteChecked($('#cadastroAnunciante'));

    $('.tipo_cadastro_input').change(function () {
        isAnuncianteChecked($(this));
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
        $('#whatsapp').unmask();

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

            $('.close').click(closeHandler);

            $('.favoritar').click(function() {
                $(this).toggleClass('favoritado');
                $.ajax({
                    url: `/usuario/favoritar/${id}`,
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
            });

            $('#enviar-avaliacao').click(function() {
                var comentario = $('#produto-comentario').val();
                $.ajax({
                    url: `/produtos/comentar/${id}`,
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        produto: {
                            comentario
                        }
                    },
                    success: function() {
                        console.log($('#comentarios').load(`${url} #comentarios`));;
                    }
                });
            });

            $('.btnstar--produto').click(function() {
                var indexClicado = $(this).data('star-index');
        
                $('.btnstar--produto').each(function() {
                    var atual = $(this).data('star-index');
        
                    if (atual <= indexClicado) {
                        $(this).css('color', '#72B01D');
                    } else {
                        $(this).css('color', '#DDDDDD');
                    }
                });

                $.ajax({
                    url: `/produtos/avaliar/${id}`,
                    type: "POST",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        produto: {
                            estrelas: indexClicado
                        }
                    },
                    success: function() {
                        $('#produto-estrelas-container').load(`${url} #produto-estrelas`);
                    }
                });
            });

            $('.btn-edit-coment').on('click', editarComentarioHandler);
        });
    });

    $('.filter-item input').change(function() {
        $('.filter-form').submit();
    });
    
    $('.mostrar').click(function() {
        var target = $(this).data('target');

        $(target).toggle('fast');
    });

    $('.mostrar#expand').click(function() {
        $(this).toggleClass('rotate');
    });

    $('.btnstar--anunciante').click(function() {
        var indexClicado = $(this).data('star-index');
        var anunciante = $('#anunciante').val();

        $('.btnstar--anunciante').each(function() {
            var atual = $(this).data('star-index');

            if (atual <= indexClicado) {
                $(this).css('color', '#72B01D');
            } else {
                $(this).css('color', '#DDDDDD');
            }
        });

        $.ajax({
            url: `/anunciante/avaliar/${anunciante}`,
            type: "POST",
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                anunciante: {
                    estrelas: indexClicado
                }
            }
        });
    });

    $('.btn-edit-coment').on('click', editarComentarioHandler);

    $(document).on('click', '.close', closeHandler);
});