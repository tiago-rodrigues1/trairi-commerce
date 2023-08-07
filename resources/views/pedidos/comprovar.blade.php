@extends('templates.base')

@section('title', 'TC | Comprovar')

@section('content')
    @php
        $soma = 0;
    @endphp
    <form class="vstack py-md-5 align-items-center justify-content-center rounded-3" action="/pedidos/comprovar/{{ $pedido->id }}" method="post">
        {{ csrf_field()}}
        <div class="bg-tc-gray h-100 h-md-auto col-12 col-md-10 col-xl-6 p-4 rounded-3">
            <header class="mb-3">
                <h4 class="m-0 text-tc-green">Comprovar pedido #{{ $pedido->id }}</h4>
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
                                    <td><a class="text-tc-green" href="/produtos/detalhar/{{ $produto->id }}">{{ $produto->nome }}</a></td>
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
                <hr>
                <section>
                    <h5 class="mb-3 text-tc-green">Avalie sua experiência</h5>
                    <form action="/pedidos/comprovar/{{ $pedido->id }}" method="POST" class="col-12">
                        {{ csrf_field() }}
                        <fieldset class="pt-3">
                            <legend class="mb-3 fs-6 fw-bold">Sobre o anunciante</legend>
                            <div class="vstack pt-4" id="avaliacoes-anunciante">
                                <h6 class="pb-2">Avalie este anunciante</h6>
                                <div class="d-flex gap-3 py-3 cursor-pointer">
                                    <input type="hidden" id="anunciante" value="{{ $pedido->anunciante->id }}">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i role="button" class="btnstar--anunciante fa-solid fa-star fa-xl" style="color: #DDDDDD;" data-star-index="{{$i + 1}}"></i>
                                    @endfor
                                </div>
                            </div>
                            <div class="my-3">
                                <label for="anunciante-comentario" class="form-label">Deixe um comentário</label>
                                <textarea class="form-control" id="anunciante-comentario" name="anunciante[comentario]" rows="4"></textarea>
                            </div>
                        </fieldset>
                        <input type="hidden" name="acao" value="Comprovado">
                        <button type="submit" class="mt-4 btn tc-btn col-12">Comprovar</button>
                    </form>
                    <a href="/" class="mt-3 btn tc-btn-ghost-red col-12">Não reconheço este pedido</a>
                </section>
            </main>
            <footer class="vstack gap-3">
                
            </footer>
        </div>
    </form>
@endsection
