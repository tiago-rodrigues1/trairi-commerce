$(document).ready(function () {
    $('.money').maskMoney({
        prefix: 'R$ ',
        allowNegative: false,
        thousands: '.',
        decimal: ',',
        affixesStay: false
    });

    $('#adicionarProduto').on('submit', function (e) {
        e.preventDefault();

        $('.money').each(function () {
            $(this).val($(this).maskMoney('unmasked')[0]);
        });

        $(this).find('button[type=submit]').attr('disabled', 'disabled').html(`
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                Aguarde...
            `);

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
        $('#image-editor').show().trigger('shown_img-product-modal');
    });

    $('#crop').click(function () {
        $('#image-editor').hide().trigger('hidden_img-product-modal');
    });

    $('#image-editor').on('shown_img-product-modal', function () {
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
    }).on('hidden_img-product-modal', function () {
        var canvas = cropper.getCroppedCanvas();

        canvas.toBlob(function (blob) {
            var croppedImg = new File([blob], `${fileName}-editado`);

            var dT = new DataTransfer();
            dT.items.add(croppedImg);

            element.files = dT.files;
        });

        cropper.destroy();
        $(`#edit_${element.id}`).remove();
    });

    $('#cancel').click(function (e) {
        console.log(e.target)
        cropper.destroy();
        $(`#edit_${element.id}`).remove();
        $('#image-editor').hide();
        element.value = "";
    });

    let cont = 0;
    $('.add').click(function () {

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
        }

        $('.remove').click(function () {
            var idToRemove = $(this).data('target');

            $(idToRemove).remove();
        });
    });
})