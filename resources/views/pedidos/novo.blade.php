@extends('templates.base')

@section('title', 'TC | Novo pedido')

@section('content')
    <form class="vstack py-md-5 align-items-center justify-content-center rounded-3">
        <div class="bg-tc-gray h-100 h-md-auto col-12 col-md-10 col-xl-7 p-4 rounded-3">
            <header class="vstack gap-3 pb-3">
                <h1 class="fs-2 text-tc-green">Seu pedido</h1>
            </header>
            <main>
                <div class="table-responsive mt-3">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Título</th>
                                <th scope="col">Preço</th>
                                <th scope="col">Quantidade</th>
                                <th scope="col">Ação</th>
                            </tr>
                        </thead>
                        @if (session()->has('usuario.carrinho'))
                        <tbody>
                            @php
                                $subtotal = 0;
                            @endphp
                            @foreach (session()->get('usuario.carrinho') as $index=>$produto)
                                @php
                                    $subtotal += $produto->valor;
                                    $modosPagamento = $produto ? $produto->anunciante->tiposDePagamento : null;
                                @endphp
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $produto->nome }}</td>
                                    <td>{{ number_format($produto->valor, 2, ',') }}</td>
                                    <td>
                                        <input type="number" class="form-control quant_item" style="width: 5rem;"
                                            name="quantidade" value="1" data-price="{{ $produto->valor }}">
                                    </td>
                                    <td>
                                        <button class="btn bg-danger text-white">Excluir</button>
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
                                <td>R$ 3,00</td>
                            </tr>
                            <tr>
                                <td colspan="5" class="text-center text-tc-green fw-bold" style="font-size: 1.125rem">
                                    Total: R$ 10,00</td>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
                <div class="col-4 my-3">
                    <label class="form-label" for="modo-pagamento">Modo de pagamento</label>
                    <select class="form-select" aria-label="Selecionar modo de pagamento">
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
                    <label class="form-label" for="observacoes">Deixe um comentário</label>
                    <textarea class="form-control" name="observacoes" id="observacoes" rows="5"></textarea>
                </div>
                </section>
                <section class="pt-3">
                    <div class="hstack gap-3 align-items-center">
                        <h4 class="text-tc-green fs-4">Seus dados</h4>
                        <a href="#" class="hstack align-items-center gap-1 text-decoration-none text-tc-green">
                            <span class="text-tc-green">Editar</span>
                            <img src="./icons/edit-3.svg" alt="">
                        </a>
                    </div>
                    <ul class="p-0 vstack gap-2">
                        <li>
                            <b>Email: </b>vegeta@gmail.com
                        </li>
                        <li>
                            <b>Telefone: </b>(84) 99988-7766
                        </li>
                        <li>
                            <b>Endereço: </b>Rua dos bobos, Nº 0
                        </li>
                    </ul>
                    <button class="btn tc-btn w-100 my-3" type="submit" {{ session()->has('usuario.carrinho') ? "" : "disabled" }}>Enviar</button>
                </section>
            </main>
        </div>
    </form>
@endsection
