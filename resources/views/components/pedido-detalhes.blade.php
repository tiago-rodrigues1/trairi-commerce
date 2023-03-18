@php
    $soma = 0;
@endphp
<div class="container-fluid bg-dark bg-opacity-25 w-100 h-100 position-fixed z-3 top-50 start-50 translate-middle" id="pd_{{ $pedido->id }}">
    <article class="bg-tc-white position-absolute top-50 start-50 translate-middle rounded-3 p-3 p-md-4 col-11 col-md-8 col-lg-6">
        <header class="mb-3">
            <div class="hstack align-items-center justify-content-between">
                <h4 class="m-0 text-tc-green">Pedido #{{ $pedido->id }}</h4>
                <button type="button" class="btn-close close" aria-label="Close"></button>
            </div>
            <p class="text-secondary mt-2">
                Pedido feito em {{ date('d/m/Y', strtotime($pedido->created_at)) }}
            </p>
        </header>
        <main>
            <section>
                <p><strong>Modo de pagamento:</strong> {{ $pedido->tipo_de_pagamento }}</p>
                <p><strong>Status:</strong> {{ $pedido->estado }}</p>
                <table class="table caption-top align-middle table-responsive table-borderless">
                    <thead>
                        <tr>
                            <th scope="col">Produto</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Quantidade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->produtos as $produto)
                            @php
                                $soma += $produto->valor * $produto->pivot->quantidade;
                            @endphp
                            <tr>
                                <td>{{ $produto->nome }}</td>
                                <td>R$ {{ number_format($produto->valor, 2, ',') }}</td>
                                <td>{{ $produto->pivot->quantidade }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr class="text-tc-green-dark">
                            <td>Subtotal: R$ {{ number_format($soma, 2, ',') }}</td>
                            <td>Frete: R$ {{ number_format($pedido->anunciante->taxa_de_entrega, 2, ',') }}</td>
                            <td>Total: R$ {{ number_format(($soma + $pedido->anunciante->taxa_de_entrega), 2, ',') }}</td>
                        </tr>
                    </tfoot>
                </table>
            </section>
            <hr>
            <section class="row align-items-start">
                <h5 class="mb-3 text-tc-green">Dados do cliente</h5>
                <div class="col-6">
                    <p><strong>Nome:</strong><br class="d-lg-none"> {{ $pedido->cliente->usuario->nome }}</p>
                    <p><strong>Telefone:</strong><br class="d-lg-none"> <span class="tel">{{ $pedido->cliente->usuario->telefone }}</span></p>
                    <p><strong>Email:</strong><br class="d-lg-none"> {{ $pedido->cliente->usuario->email }}</p>
                </div>
                <div class="col-6">
                    <p><strong>Cidade:</strong><br class="d-lg-none"> {{$pedido->cidade_destino }}</p>
                    <p><strong>Bairro:</strong><br class="d-lg-none"> {{$pedido->bairro_destino }}</p>
                    <p><strong>Endereço:</strong><br class="d-lg-none"> {{$pedido->endereco_destino }}</p>
                </div>
            </section>
        </main>
        @if (session()->get('acesso') == 'anunciante')
            <footer class="mt-4 hstack align-items-center justify-content-between">
                <a class="col-4 btn tc-btn-outline-red">Recusar</a>
                <a class="col-7 btn tc-btn">Aceitar</a>
            </footer>
        @endif
    </article>
</div>
