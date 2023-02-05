@extends('templates.base')

@section('title', 'Trairi Commerce')

@section('content')
    <main class="w-100 d-flex flex-column align-items-center p-5 gap-5">
        <x-product-section sectionTitle="Mais estrelas">
            <x-cardproduto />
            <x-cardproduto />
            <x-cardproduto />
            <x-cardproduto />
            <x-cardproduto />
            <x-cardproduto />
        </x-product-section>
        <x-product-section sectionTitle="Serviços mais solicitados">
            <x-cardproduto />
            <x-cardproduto />
            <x-cardproduto />
            <x-cardproduto />
        </x-product-section>
        <x-product-section sectionTitle="Mais vendidos">
            <x-cardproduto />
            <x-cardproduto />
            <x-cardproduto />
            <x-cardproduto />
            <x-cardproduto />
            <x-cardproduto />
        </x-product-section>
    </main>
@endsection
