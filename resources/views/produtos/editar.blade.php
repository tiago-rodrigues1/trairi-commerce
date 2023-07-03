@extends('templates.base')

@section('title', 'TC | Editar produto')
@section('extraLinks')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css"
        integrity="sha512-cyzxRvewl+FOKTtpBzYjW6x6IAYUCZy3sGP40hn+DQkqeluGRCax7qztK2ImL64SA+C7kVWdLI6wvdlStawhyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('content')
    <main class="p-4 vstack align-items-center justify-content-center" id="container">
        <form class="col-12 col-md-10 col-xl-6 p-4 rounded-3 d-flex flex-column gap-4" enctype="multipart/form-data"
            method="post" action="/produtos/editar/{{ $produto->id }}" id="editarProduto">
            {{ csrf_field() }}
            <h1 class="fs-2 text-tc-green">Editar produto</h1>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="isDisponivel"
                    {{ $produto->disponibilidade ? 'checked' : '' }}>
                <label class="form-check-label" for="isDisponivel">Disponível</label>
            </div>
            <div>
                <label class="form-label" for="produto_nome">Título</label>
                <input class="form-control" type="text" name="nome" id="produto_nome" value="{{ $produto->nome }}">
            </div>
            <div>
                <label class="form-label" for="categoria">Categoria</label>
                <select name="categoria_id" id="categoria" class="form-select">
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id }}"
                            {{ $categoria->id === $produto->categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="form-label" for="descricao">Descrição</label>
                <textarea class="form-control" name="descricao" id="descricao" cols="30" rows="10">{{ $produto->descricao }}</textarea>
            </div>
            <div>
                <label class="form-label" for="valor">Valor</label>
                <input class="form-control" type="text" name="valor" id="valor" value="{{ $produto->valor }}">
            </div>
            <div>
                <label class="form-label" for="taxa_de_entrega">Taxa de entrega</label>
                <input class="form-control money" type="text" name="taxa_de_entrega" id="taxa_de_entrega" value="{{ $produto->taxa_de_entrega }}">
            </div>
            <div class="w-100">
                <h6 class="fw-normal mb-3">Fotos</h6>
                <div class="vstack gap-3 align-items-center justify-content-center fileInputs-container">
                    @for ($i = 0; $i < 5; $i++)
                        @if (isset($produto->imagens[$i]))
                            <div class="d-flex gap-3 align-items-center img-container">
                                <button type="button"
                                    class="substituir border-0 p-0 rounded-3 d-flex align-items-center justify-content-center"
                                    style="width: 6rem; height: 4rem;background: #EEEEEE; cursor: pointer;"
                                    data-related="#input_img{{ $i }}">
                                    <img src="/icons/edit.svg" class="img-fluid rounded-3"
                                        alt="Botão com ícone de editar para substituir imagem">
                                </button>
                                <div class="border-0 p-0 rounded-3 d-flex align-items-center justify-content-center"
                                    style="width: 6rem; height: 4rem; background: #EEEEEE;"
                                    data-target="#input_img{{ $i }}">
                                    <img src="/storage/{{ $produto->imagens[$i]->path }}" alt="{{ $produto->nome }}"
                                        class="img-fluid rounded-3">
                                </div>
                                <button type="button"
                                    class="remover border-0 p-0 rounded-3 d-flex align-items-center justify-content-center"
                                    style="width: 6rem; height: 4rem;background: #EEEEEE; cursor: pointer;"
                                    data-related="#input_img{{ $i }}">
                                    <img src="/icons/trash.svg" class="img-fluid rounded-3"
                                        alt="Botão com ícone de lixeira para remover imagem">
                                </button>
                            </div>
                        @else
                            <div class="d-flex gap-3 align-items-center img-container">
                                <div class="add_img border-0 p-0 rounded-3 d-flex align-items-center justify-content-center"
                                    style="width: 6rem; height: 4rem;background: #EEEEEE; cursor: pointer;"
                                    data-target="#input_img{{ $i }}">
                                    <img src="/icons/plus.svg" class="img-fluid rounded-3"
                                        alt="Ícone de soma para adicionar imagem">
                                </div>
                            </div>
                        @endif
                        <input type="file" name="imagens[]" id="input_img{{ $i }}"
                            value="{{ isset($produto->imagens[$i]) ? $produto->imagens[$i]->path : '' }}"
                            style="display: none !important;">
                    @endfor
                </div>
            </div>
            <div class="vstack gap-3">
                <button type="submit" class="btn tc-btn mt-3">Editar</button>
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
    <script src="/scripts/pages/editar_produto.js"></script>
@endsection
