@extends('templates.list')

@section('title', 'TC | Seus pedidos')

@section('pageLabel', 'Seus pedidos')
@section('resultsCount', count($pedidos))

@php
    $estadoColorSetup = [
        'Pendente' => 'bs-orange',
        'Aceito' => 'bs-blue',
        'Recusado' => 'tc-red',
        'Cancelado' => 'tc-red',
        'Finalizado' => 'tc-green'
    ]
@endphp

@section('items')
    <section class="col-12 col-xl-10">
        @forelse ($pedidos as $pedido)
            <article class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between small-text">
                    <ul class="w-100 d-flex gap-3 gap-md-4 p-0 m-0">
                        <li class="d-flex flex-column align-items-center">
                            <span class="text-black-50">ENVIADO EM</span>
                            <span>{{ date('d/m/Y',strtotime($pedido->created_at)) }}</span>
                        </li>
                        <li class="d-flex flex-column align-items-center">
                            <span class="text-black-50">TOTAL</span>
                            <span>R$ 33,00</span>
                        </li>
                        <li class="d-flex flex-column align-items-center">
                            <span class="text-black-50">ANUNCIANTE</span>
                            <span>{{ $pedido->produtos[0]->anunciante->nome_fantasia }}</span>
                        </li>
                    </ul>
                    <div class="d-flex flex-column align-items-center">
                        <span class="text-black-50">PEDIDO</span>
                        <span>Nº {{ $pedido->id }}</span>
                    </div>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @foreach ($pedido->produtos as $produto)
                            <li class="list-group-item d-flex align-items-center gap-3">
                                <img src="/storage/{{ $produto->imagens[0]->path }}" class="img-fluid col-3 col-sm-2 col-lg-1 rounded-2" alt="Foto de {{ $produto->nome }}">
                                <div>
                                    <h6>{{ $produto->nome }}</h6>
                                    <span>Quantidade: {{ $produto->pivot->quantidade }}</span>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-footer d-flex align-items-center justify-content-between">
                    <span class="" style="color: var(--{{ $estadoColorSetup[$pedido->estado] }});">{{ $pedido->estado }}</span>
                    <button type="button" class="btn tc-btn col-6 col-md-3">Detalhar</button>
                </div>
            </article>
        @empty
            <p>Não tem pedidos</p>
        @endforelse
        {{-- <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 g-4 justify-content-center justify-content-md-start">
            @forelse ($pedidos as $pedido)
                @foreach ($pedidos->produtos as $produto)
                    <article class="bg-tc-gray rounded-3 p-3 col m-2">
                        <div class="hstack">
                            <div class="vstack">
                                <span><b>{{ $produto->nome }}</b></span>
                                <span>Tiago Rodrigues</span>
                            </div>
                            <div class="vstack text-end">
                                <span>R$ 40,00</span>
                                <span>17/03/2022</span>
                            </div>
                        </div>
                        <hr>
                        <div class="hstack justify-content-between">
                            <span class="text-tc-green">Finalizado</span>
                            <button type="button" class="btn tc-btn">Abrir</button>
                        </div>
                    </article>
                @endforeach
            @empty
                <p>Não tem pedidos</p>
            @endforelse
        </div> --}}
    </section>
@endsection
