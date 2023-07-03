@extends('templates.base')

@section('title', 'TC | Seu catálogo')

@section('pageLabel', 'Seu catálogo')
@section('resultsCount', count($produtos))

@section('extralinks')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
@endsection

@section('content')
    <div class="p-4">
        <h1 class="fs-2">Seu catálogo</h1>
        <h6>x resultados encontrados</h6>
    </div>
    <div class="p-4">
        <table id="produtosTable" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Valor</th>
                    <th>Disponível</th>
                    <th>Taxa de Entrega</th>
                    <th>Adicionado</th>
                    <th>Detalhar</th>
                    <th>Editar</th>
                    <th>Excluir</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->valor }}</td>
                        <td>{{ $produto->disponibilidade }}</td>
                        <td>{{ $produto->taxa_de_entrega }}</td>
                        <td>{{ $produto->created_at }}</td>
                        <td>detalhar</td>
                        <td> <a class="btn tc-btn" href="/produtos/editar/{{ $produto->id }}">Editar</a></td>
                        <td><form action="/produtos/excluir/{{ $produto->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn tc-btn-outline-red">Excluir</button>
                            </form></td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="/scripts/pages/produtos.js"></script>
@endsection
    
