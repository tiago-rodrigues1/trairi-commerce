@extends('templates.base')

@section('title', 'TC | Meu perfil')

@section('content')
    <main class="p-4 vstack align-items-center justify-content-center">

        <section class="vstack gap-4 p-4">
            <div class="hstack gap-4">
                <img src="/images/perfil.jpg" alt="Imagem de perfil" class="rounded-circle"
                    style="width: 8rem; height: 8rem;">
                <div class="vstack">
                        <h3><b>{{ $anunciante->nome_fantasia }}</b></h3>
                    <p>{{ $anunciante->descricao }}</p>
                    <div id="hstack">
                        <i class="fa-solid fa-location-dot" style="color: #72b01d;"></i>
                        <span>Localização: {{ $anunciante->cidade }}, {{ $anunciante->bairro }} Rua {{ $anunciante->endereco }}</span>
                    </div>
                </div>
            </div>
            <div class="vstack bg-tc-gray border rounded-3  align-items-center gap-2 p-2">
                <span><b>Canais de atendimento</b> </span>
                <div class="gap-4 p-2 hstack justify-content-center align-content-space-around">
                    <div class=" ">
                        <i class="fa-solid fa-envelope" style="color: #72b01d;"></i>
                        <span>{{ $anunciante->email_anunciante }}</span>
                    </div>

                    <div class="  ">
                        <i class="fa-brands fa-whatsapp" style="color: #72b01d;"></i>
                        <span data-mask="(00) 00000-0000">{{ $anunciante->whatsapp }}</span>
                    </div>

                    <div class=" ">
                        <i class="fa-brands fa-facebook" style="color: #72b01d;"></i>
                        <span>{{ $anunciante->facebook }}</span>
                    </div>

                    <div class=" ">
                        <i class="fa-brands fa-instagram" style="color: #72b01d;"></i>
                        <span>{{ $anunciante->instagram }}</span>
                    </div>
                </div>
            </div>

            <x-product-section sectionTitle="Produtos">
                @foreach ($produtos as $produto)
                    <x-card-produto :produto="$produto" />
                @endforeach
            </x-product-section>
        </section>
    </main>
    
    <script src="/scripts/pages/perfil.js"></script>

@endsection