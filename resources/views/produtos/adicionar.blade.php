@extends('templates.base')

@section('title', 'TC | Adicionar produto')

@section('content')
    <main class="p-4 vstack align-items-center justify-content-center">
        <form class="col-12 col-md-10 col-xl-6 p-4 rounded-3 d-flex flex-column gap-4" enctype="multipart/form-data" method="post" action="/produtos/cadastrar">
            {{csrf_field()}}
            <h1 class="fs-2 text-tc-green">Adicionar ao catálogo</h1>
            <fieldset>
                <legend class="fs-5">Você deseja adicionar um</legend>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="is_servico" id="itemTypeProduct" value="0" checked>
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
                <input class="form-control" type="text" name="valor" id="valor">
            </div>
            <div>
                <label class="form-label" for="taxa_entrega">Taxa de entrega</label>
                <input class="form-control" type="text" name="taxa_entrega" id="taxa_entrega">
            </div>
            <div class="vstack gap-4">
                <div class="fileInputs-container">
                    <label class="form-label" for="imagens">Fotos</label>
                    <input type="file" class="form-control" name="imagens[]" id="imagens">
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
@endsection
