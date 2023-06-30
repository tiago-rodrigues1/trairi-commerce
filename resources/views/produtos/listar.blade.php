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
                    <th>Adicionado</th>
                    <th>Detalhar</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->id }}</td>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->valor }}</td>
                        <td>{{ $produto->disponibilidade }}</td>
                        <td>{{ $produto->created_at }}</td>
                        <td>detalhar</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
    <script src="/scripts/pages/produtos.js"></script>
@endsection
    
