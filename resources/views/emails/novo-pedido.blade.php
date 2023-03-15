<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>Novo Pedido</title>
</head>
<body>
    <h1>Um novo pedido para {{ $anunciante->nome_fantasia }}</h1>
    <p>{{ $cliente->usuario->nome }} pediu:</p>
    <ul>
        @foreach ($pedido->produtos as $produto)
            <li>{{ $produto->nome }}</li>
        @endforeach
    </ul>
    <a href="https://google.com">Clique para saber mais</a>
</body>
</html>