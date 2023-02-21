@extends('templates.base')

@section('title', 'Trairi Commerce')

@section('content')
    <main class="w-100 d-flex flex-column align-items-center p-5 gap-5">
        <x-product-section sectionTitle="Mais recentes">
            @foreach ($produtos as $produto)
                <x-card-produto :produto="$produto" />
            @endforeach
        </x-product-section>
    </main>
@endsection
