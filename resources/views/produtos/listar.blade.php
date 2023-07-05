@extends('templates.base')

@section('title', 'TC | Seu catálogo')

@section('extralinks')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    <div class="p-4 vstack gap-4">
        <div>
            <h1>Seu catálogo</h1>
            <h6>0 Resultados encontrados</h6>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Produto</th>
                        <th>Preço</th>
                        <th>Disponível</th>
                        <th>Adicionado</th>
                        <th>Detalhar</th>
                    </tr>
                </thead>
                <tbody class="produtos">
                    @forelse ($produtos as $produto)
                        <tr class="produto">
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->nome }}</td>
                            <td>{{ $produto->valor }}</td>
                            <td>{{ $produto->disponibilidade }}</td>
                            <td>{{ $produto->created_at }}</td>
                            <td><a href="/produtos/detalhar/{{ $produto->id }}">Abrir</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td>Sem produtos</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script src="/scripts/pages/produtos.js"></script>
@endsection
    
