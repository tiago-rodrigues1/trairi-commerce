@extends('templates.base')

@section('title', 'TC | Novo pedido')

@section('content')
    <form class="vstack py-md-5 align-items-center justify-content-center rounded-3" action="/pedidos/novo" method="POST">
        {{ csrf_field() }}
        <div class="bg-tc-gray h-100 h-md-auto col-12 col-md-10 col-xl-7 p-4 rounded-3">
            <header class="vstack gap-3 pb-3">
                <h1 class="fs-2 text-tc-green">Seu pedido</h1>
                <h6 class="fs-normal small text-tc-green">Você só pode adicionar produtos de um mesmo anunciante</h6>
            </header>
            <main>
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Produto</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        @if (session()->get('carrinho'))
                        <tbody>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach (session()->get('carrinho') as $index=>$produto)
                                @php
                                    $subtotal += $produto->valor;
                                    $modosPagamento = $produto ? $produto->anunciante->tiposDePagamento : null;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $produto->nome }}
                                        <input type="hidden" name="produto_id[]" value="{{ $produto->id }}">
                                    </td>
                                    <td>{{ number_format($produto->valor, 2, ',') }}</td>
                                    <td>
                                        <input type="number" class="form-control quant_item" style="width: 5rem;"
                                            name="quantidade[]" value="1" data-price="{{ $produto->valor }}">
                                    </td>
                                    <td>
                                        <a class="btn bg-tc-red text-white" href="/pedidos/carrinho/remover/{{ $produto->id }}">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td>#</td>
                                <td><strong>Subotal</strong></td>
                                <td id="subtotal">{{ number_format($subtotal, 2, ',') }}</td>
                                <td><strong>Frete</strong></td>
                                <td id="frete" data-frete="{{ $produto->anunciante->taxa_de_entrega }}">{{ number_format($produto->anunciante->taxa_de_entrega, 2, ',') }}</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-center text-tc-green fw-bold" style="font-size: 1.125rem" id="total">Total: {{ number_format($subtotal + $produto->anunciante->taxa_de_entrega, 2, ',') }}</td>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
                <div class="col-4 my-3">
                    <label class="form-label" for="modo-pagamento">Modo de pagamento</label>
                    <select class="form-select" aria-label="Selecionar modo de pagamento" name="tipo_de_pagamento_id">
                        @if (isset($modosPagamento))
                            @foreach ($modosPagamento as $modoPagamento)
                                <option value="{{ $modoPagamento->id }}">{{ $modoPagamento->descricao }}</option>
                            @endforeach
                        @else
                            <option selected disabled>Escolha um produto</option>
                        @endif
                    </select>
                </div>
                <div class="col-8 pb-3">
                    <label class="form-label" for="observacao">Deixe um comentário</label>
                    <textarea class="form-control" name="observacao" id="observacao" rows="5"></textarea>
                </div>
                </section>
                <section class="pt-3">
                    <div class="hstack gap-3 align-items-center">
                        <h4 class="text-tc-green fs-4">Endereço</h4>
                        <a href="#" class="hstack align-items-center gap-1 text-decoration-none text-tc-green">
                            Editar
                        </a>
                    </div>
                    <ul class="p-0 vstack gap-2">
                        <li class="row p-0 mt-0 gx-2 mb-3">
                            <div class="form-floating col-6">
                                <input type="text" class="form-control" data-mask="00000-000" name="cep_destino" id="perfil_cep" value="{{$u->cep}}" readonly>
                                <label for="cep">CEP</label>
                            </div>
                            <div class="form-floating col-6">
                                <input type="text" class="form-control" name="cidade_destino" id="perfil_cidade" value="{{$u->cidade}}" readonly>
                                <label for="cidade">Cidade</label>
                            </div>
                        </li>
                        <li class="row p-0 mt-0 gx-2 mb-3">
                            <div class="form-floating col-6">
                                <input type="text" class="form-control" name="bairro_destino" id="perfil_bairro" value="{{$u->bairro}}" readonly>
                                <label for="bairro">Bairro</label>
                            </div>
                            <div class="form-floating col-6">
                                <input type="text" class="form-control" name="endereco_destino" id="perfil_endereco" value="{{$u->endereco}}" readonly>
                                <label for="endereco">Endereço</label>
                            </div>
                        </li>
                    </ul>
                    <button class="btn tc-btn w-100 my-3" type="submit" {{ session()->get('carrinho') ? "" : "disabled" }}>Enviar</button>
                </section>
            </main>
        </div>
    </form>
    <script src="/scripts/pages/carrinho.js"></script>
@endsection
