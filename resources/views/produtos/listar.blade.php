@extends('templates.list')

@section('title', 'TC | Seu catálogo')

@section('pageLabel', 'Seu catálogo')
@section('resultsCount', count($produtos))

@section('items')
    <x-product-section :sectionTitle="null">
        @forelse ($produtos as $produto)
            <x-card-produto-catalogo :produto="$produto" />
        @empty
            <p>Não tem produtos</p>
        @endforelse
    </x-product-section>
@endsection
