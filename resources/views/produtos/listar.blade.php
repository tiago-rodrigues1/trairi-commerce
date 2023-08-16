@extends('templates.base')

@section('title', 'TC | Seu catálogo')

@section('extralinks')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    <div class="p-4 vstack gap-4">
        <div>
            <h1>Seu catálogo</h1>
            <h6>{{ isset($produtos) ? count($produtos) : 0 }} Resultados encontrados</h6>
        </div>

        <div class="mt-3 mb-2 w-100 d-flex align-items-end justify-content-between">
            <div class="col-4">
                <label class="form-label" for="busca-catalogo">Pesquisar</label>
                <input class="form-control" type="text" id="busca-catalogo">
            </div>
            <div class="col-1">
                <a class="btn tc-btn w-100" href="/produtos/adicionar">Novo</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Disponível</th>
                        <th>Taxa de Entrega</th>
                        <th>Adicionado</th>
                        <th>Detalhar</th>
                        <th>Editar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody class="produtos">
                    @forelse ($produtos as $produto)
                        <tr>
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->valor }}</td>
                            <td>{{ $produto->disponibilidade }}</td>
                            <td>{{ $produto->taxa_de_entrega }}</td>
                            <td>{{ $produto->created_at }}</td>
                            <td><a href="#" data-produto_id="{{ $produto->id }}" class="open">Abrir</a></td>
                            <td><a class="btn tc-btn" href="/produtos/editar/{{ $produto->id }}">Editar</a></td>
                            <td>
                                <form action="/produtos/arquivar/{{ $produto->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn tc-btn-outline-red">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">Sem produtos</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
            </div>    
    </div>

    <script src="/scripts/pages/produtos.js"></script>
@endsection
    
