@extends('templates.list')

@section('title', 'TC | Favoritos')

@section('pageLabel', 'Seus favoritos')
@section('resultsCount', count($favoritos))

@section('items')
    <x-product-section :sectionTitle="null">
        @forelse ($favoritos as $favorito)
            <x-card-produto :produto="$favorito" />
        @empty
            <p>Não tem produtos</p>
        @endforelse
    </x-product-section>
@endsection