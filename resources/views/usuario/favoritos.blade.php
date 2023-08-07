@extends('templates.base')

@section('title', 'TC | Meu perfil')

@section('content')
    <div class="container-fluid p-4 vstack align-items-center justify-content-center">
        <x-product-section sectionTitle="Seus Favoritos">
            @forelse ($favoritos as $favorito)
                <x-card-produto :produto="$favorito" />
            @empty
                <p>Não tem produtos</p>
            @endforelse
        </x-product-section>
    </div>
@endsection