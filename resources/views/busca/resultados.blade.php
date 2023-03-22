@extends('templates.list')

@section('title', 'TC | Resultado')

@section('pageLabel', 'Resultados para '.$termo)
@section('resultsCount', count($resultados))

@section('items')
    <x-product-section :sectionTitle="null">
        @forelse ($resultados as $resultado)
            <x-card-produto :produto="$resultado" />
        @empty
            <p>Não tem produtos</p>
        @endforelse
    </x-product-section>
@endsection
