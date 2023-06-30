@extends('templates.base')

@section('title', 'Trairi Commerce')

@section('content')
    <main class="w-100 d-flex flex-column align-items-center p-5 gap-5">
        @if (isset($pedidosParaComprovar) && count($pedidosParaComprovar) > 0)
            <div class="col-12 col-md-8 bg-tc-green--transparent text-tc-green rounded-3 p-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <img src="/icons/alert-triangle.svg" alt="Sinal de alerta">
                        <span>
                            Você tem {{ count($pedidosParaComprovar) }} pedido(s) para comprovar
                        </span>
                    </div>
                    <button class="mostrar bg-transparent border-0 fs-0 p-0 m-0 text-tc-green" id="expand" data-target="#pedidosComprovar">
                        <img src="/icons/chevron-down.svg" alt="Expandir">
                    </button>
                </div>
                <ul id="pedidosComprovar" class="border-top mt-3 p-0" style="display: none; border-color: rgba(114, 176, 29, .3) !important;">
                    @foreach ($pedidosParaComprovar as $pedido)
                        <li class="mt-3 pb-3 border-bottom" style="border-color: rgba(114, 176, 29, .3) !important;">
                            <span>
                                Pedido #{{ $pedido->id }} em {{ date('d/m/Y', strtotime($pedido->created_at)) }} - {{ $pedido->anunciante->nome_fantasia }}
                            </span>
                            <br>
                            <a href="/pedidos/listar?pedidos-estado%5B%5D=Finalizado" class="text-tc-green text-underline">Acessar</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <x-product-section sectionTitle="Mais recentes">
            @foreach ($produtos as $produto)
                <x-card-produto :produto="$produto" />
            @endforeach
        </x-product-section>
    </main>
@endsection
