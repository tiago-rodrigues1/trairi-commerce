@extends('templates.base')

@section('title', 'Trairi Commerce')

@section('content')
    <main class="p-5 vstack gap-5">
        <section class="col-12 col-lg-9 col-xl-10">
            <h1 class="fs-3 pb-4">Produtos mais vendidos</h1>
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 gap-lg-4">
                <x-cardproduto />
                <x-cardproduto />
                <x-cardproduto />
            </div>
        </section>
        <section class="col-12 col-lg-9 col-xl-10">
            <h1 class="fs-3 pb-4">Serviços mais solicitados</h1>
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 gap-lg-4">
                <x-cardproduto />
                <x-cardproduto />
                <x-cardproduto />
            </div>
        </section>
        <section class="col-12 col-lg-9 col-xl-10">
            <h1 class="fs-3 pb-4">Produtos mais vendidos</h1>
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 gap-lg-4">
                <x-cardproduto />
                <x-cardproduto />
                <x-cardproduto />
            </div>
        </section>
    </main>
@endsection
