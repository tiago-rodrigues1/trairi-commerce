$(document).ready(function () {   


    var image, cropper, fileName, element;
    $('#fotoPerfil').on('change', function (e) {
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
            aspectRatio: 1,
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
})