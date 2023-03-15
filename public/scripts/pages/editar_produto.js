$(document).ready(function () {
    $('#valor').focus(function () {
        $(this).addClass('money');

        $('.money').maskMoney({
            prefix: 'R$ ',
            allowNegative: false,
            thousands: '.',
            decimal: ',',
            affixesStay: false
        });
    });

    $('#editarProduto').on('submit', function (e) {
        e.preventDefault();

        $('.money').each(function () {
            $(this).val($(this).maskMoney('unmasked')[0]);
        });

        $(this).find('button[type=submit]').attr('disabled', 'disabled').html(`
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Aguarde...
            `);

        $(`input[name="imagens[]"]`).each(function () {
            if ($(this).attr('value') && !($(this).prop('files').length)) {
                var divImg = $(`div[data-target="#${$(this).attr('id')}"]`).children('img')[0];

                console.log();

                var newInput = document.createElement('input');
                newInput.type = 'hidden';
                newInput.name = 'mantem[]';
                newInput.value = $(divImg).attr('src').split('storage/');

                $(this).append(newInput);
            }
        });

        $(this).unbind('submit').submit();
    });

    var image, cropper, fileName, element;
    $('.fileInputs-container').on('change', function (e) {
        var file = e.target.files[0];
        var imageSrc = URL.createObjectURL(file);

        fileName = file.name;
        element = e.target;

        $('#img-canvas').append(
            `<img src="${imageSrc}" class="img-fluid pt-2" alt="" id="edit_${e.target.id}">`);
        image = document.getElementById(`edit_${e.target.id}`);
        $('#image-editor').show().trigger('shown_modal');
    });

    $('#crop').click(function () {
        $('#image-editor').hide().trigger('hidden_modal');
    });

    $('#image-editor').on('shown_modal', function () {
        cropper = new Cropper(image, {
            viewMode: 1,
            dragMode: 'move',
            aspectRatio: 1.5,
            restore: false,
            guides: true,
            center: true,
            highlight: true,
            cropBoxMovable: false,
            cropBoxResizable: false,
            toggleDragModeOnDblclick: false,
            ready: function () {
                $('#zoom_in').click(function () {
                    cropper.zoom(0.1);
                });

                $('#zoom_out').click(function () {
                    cropper.zoom(-0.1);
                });
            },

            zoom: function () {
                if (event.detail.oldRatio === 1) {
                    event.preventDefault();
                }
            }
        });
    }).on('hidden_modal', function () {
        var canvas = cropper.getCroppedCanvas();

        canvas.toBlob(function (blob) {
            var croppedImg = new File([blob], `${fileName}-editado`);

            var dT = new DataTransfer();
            dT.items.add(croppedImg);

            element.files = dT.files;

            var addImgElement = $(`div[data-target="#${element.id}"]`);

            if (addImgElement.hasClass('add_img')) {
                addImgElement.off('click').removeClass('add_img').css('cursor', 'default')
                    .trigger('show.button.opts');
            }

            var img = $(addImgElement).children('img');
            img.attr('src', URL.createObjectURL(element.files['0']));
        });

        cropper.destroy();
        $(`#edit_${element.id}`).remove();
    });

    $('#cancel').click(function () {
        cropper.destroy();
        $(`#edit_${element.id}`).remove();
        $('#image-editor').hide();
        element.value = "";
    });

    $('.img-container').on('click', '.add_img', function () {
        var input = $(this).data('target');

        $(input).click();
    });

    $('.img-container').on('click', 'button', function (e) {
        var input = $(this).data('related');

        if ($(this).hasClass('substituir')) {
            $(input).click();
        } else if ($(this).hasClass('remover')) {
            $(input).val("");
            $(input).files = [];
            $(this).prev().addClass('add_img').css('cursor', 'pointer').children('img').attr('src',
                '/icons/plus.svg');
            $(`.substituir[data-related="${input}"]`).remove();
            $(`.remover[data-related="${input}"]`).remove();
        } else {
            return;
        }
    });

    $('.img-container').on('show.button.opts', function (e) {
        $(e.target).before(`
            <button type="button" class="substituir border-0 p-0 rounded-3 d-flex align-items-center justify-content-center" style="width: 6rem; height: 4rem;background: #EEEEEE; cursor: pointer;" data-related="${$(e.target).data('target')}">
                <img src="/icons/edit.svg" class="img-fluid rounded-3" alt="">
            </button>
        `).after(`
            <button type="button" class="remover border-0 p-0 rounded-3 d-flex align-items-center justify-content-center" style="width: 6rem; height: 4rem;background: #EEEEEE; cursor: pointer;" data-related="${$(e.target).data('target')}">
                <img src="/icons/trash.svg" class="img-fluid rounded-3" alt="">
            </button>
        `);
    });
})