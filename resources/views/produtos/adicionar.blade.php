@extends('templates.base')

@section('title', 'TC | Adicionar produto')
@section('extraLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css"
        integrity="sha512-cyzxRvewl+FOKTtpBzYjW6x6IAYUCZy3sGP40hn+DQkqeluGRCax7qztK2ImL64SA+C7kVWdLI6wvdlStawhyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <main class="p-4 vstack align-items-center justify-content-center" id="container">
        <form class="col-12 col-md-10 col-xl-6 p-4 rounded-3 d-flex flex-column gap-4" enctype="multipart/form-data"
            method="post" action="/produtos/cadastrar" id="adicionarProduto">
            {{ csrf_field() }}
            <h1 class="fs-2 text-tc-green">Adicionar ao catálogo</h1>
            <fieldset>
                <legend class="fs-5">Você deseja adicionar um</legend>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_servico" id="itemTypeProduct" value="0"
                        checked>
                    <label class="form-check-label" for="itemTypeProduct">
                        Produto
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_servico" id="itemTypeService" value="1">
                    <label class="form-check-label" for="itemTypeService">
                        Serviço
                    </label>
                </div>
            </fieldset>
            <div>
                <label class="form-label" for="produto_nome">Título</label>
                <input class="form-control" type="text" name="nome" id="produto_nome">
            </div>
            <div>
                <label class="form-label" for="categoria">Categoria</label>
                <select name="categoria_id" id="categoria" class="form-select">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="form-label" for="descricao">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10"></textarea>
            </div>
            <div>
                <label class="form-label" for="valor">Valor</label>
                <input class="form-control money" type="text" name="valor" id="valor">
            </div>
            <div class="vstack gap-4">
                <div class="fileInputs-container">
                    <label class="form-label" for="imagens">Fotos</label>
                    <input type="file" class="file form-control" name="imagens[]" id="imagens">
                </div>
                <button type="button" class="add btn btn-sm tc-dashed-btn w-100 text-tc-green">
                    <img src="/icons/plus.svg" alt="Ícone de sinal de mais. Para adicionar imagem do produto ou serviço">
                </button>
            </div>
            <div class="vstack gap-3">
                <button type="submit" class="btn tc-btn mt-3">Adicionar</button>
                <a href="/produtos/listar" class="btn tc-btn-ghost-green">Voltar para catálogo</a>
            </div>
        </form>
    </main>

    <div class="modal w-100 h-100 bg-dark bg-opacity-25 fixed" id="image-editor">
        <div class="modal-dialog overflow-y-scroll modal-xl">
            <div class="modal-content h-100 p-4 vstack align-items-center">
                <div class="w-50 h-50 d-flex flex-column gap-4 align-items-center">
                    <div class="d-flex gap-3 align-self-end">
                        <button type="button" class="btn border-2" style="font-size: 0; border-color: var(--tc-green);"
                            id="zoom_in">
                            <img src="/icons/zoom-in.svg" alt="">
                        </button>
                        <button type="button" class="btn border-2" style="font-size: 0; border-color: var(--tc-green);"
                            id="zoom_out">
                            <img src="/icons/zoom-out.svg" alt="">
                        </button>
                    </div>
                    <div class="w-100 h-100" id="img-canvas">
                    </div>
                    <div class="hstack align-items-center justify-content-between">
                        <button class="col-6 btn tc-btn-ghost-red" type="button" id="cancel">Cancelar</button>
                        <button class="col-5 btn tc-btn" type="button" id="crop">Ok</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"
        integrity="sha512-6lplKUSl86rUVprDIjiW8DuOniNX8UDoRATqZSds/7t6zCQZfaCe3e5zcGaQwxa8Kpn5RTM9Fvl3X2lLV4grPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            $('.money').maskMoney({
                prefix: 'R$ ',
                allowNegative: false,
                thousands: '.',
                decimal: ',',
                affixesStay: false
            });

            $('#adicionarProduto').on('submit', function(e) {
                e.preventDefault();

                $('.money').each(function() {
                    $(this).val($(this).maskMoney('unmasked')[0]);
                });

                $(this).find('button[type=submit]').attr('disabled', 'disabled').html(`
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Aguarde...
                    `);

                $(this).unbind('submit').submit();
            });

            var image, cropper, fileName, element;
            $('.fileInputs-container').on('change', function(e) {
                var file = e.target.files[0];
                var imageSrc = URL.createObjectURL(file);

                fileName = file.name;
                element = e.target;

                $('#img-canvas').append(
                    `<img src="${imageSrc}" class="img-fluid pt-2" alt="" id="edit_${e.target.id}">`);
                image = document.getElementById(`edit_${e.target.id}`);
                $('#image-editor').show().trigger('shown_modal');
            });

            $('#crop').click(function() {
                $('#image-editor').hide().trigger('hidden_modal');
            });

            $('#image-editor').on('shown_modal', function() {
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
                    ready: function() {
                        $('#zoom_in').click(function() {
                            cropper.zoom(0.1);
                        });

                        $('#zoom_out').click(function() {
                            cropper.zoom(-0.1);
                        });
                    },

                    zoom: function() {
                        if (event.detail.oldRatio === 1) {
                            event.preventDefault();
                        }
                    }
                });
            }).on('hidden_modal', function() {
                var canvas = cropper.getCroppedCanvas();

                canvas.toBlob(function(blob) {
                    var croppedImg = new File([blob], `${fileName}-editado`);

                    var dT = new DataTransfer();
                    dT.items.add(croppedImg);

                    element.files = dT.files;
                });

                cropper.destroy();
                $(`#edit_${element.id}`).remove();
            });

            $('#cancel').click(function() {
                cropper.destroy();
                $(`#edit_${element.id}`).remove();
                $('#image-editor').hide();
                element.value = "";
            });
        })
    </script>
@endsection
