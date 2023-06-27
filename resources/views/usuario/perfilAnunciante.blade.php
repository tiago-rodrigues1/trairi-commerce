@extends('templates.base')

@section('title', 'TC | Meu perfil')

@section('content')

    <main class="p-4 vstack align-items-center justify-content-center">

        <section class="vstack gap-4 p-4">
                    <div class="hstack gap-4">
                        <img src="/images/perfil.jpg" alt="Imagem de perfil" class="rounded-circle"
                            style="width: 8rem; height: 8rem;">
                        <div class="vstack">
                            <div>
                                <h3><b>{{ $anunciante->nome_fantasia }}</b></h3>
                            </div>
                            <p>{{ $anunciante->descricao }}</p>
                            <span>Localização: {{ $anunciante->cidade }}, {{ $anunciante->bairro }} Rua {{ $anunciante->endereco }}</span>
                        </div>
                    </div>
                    <div class="vstack bg-tc-gray border rounded-3  align-items-center gap-2 p-2">
                        <span><b>Canais de atendimento</b> </span>
                        <div class="gap-4 p-2 hstack justify-content-center align-content-space-around">
                            <div class=" ">
                                <img src="/icons/canais_anunciante/email-svgrepo-com.svg" alt="Icone E-mail" class="rounded-circle"
                                    style="width: 2.5rem; height: 2.5rem;">
                                    <span>{{ $anunciante->email_anunciante }}</span>
                            </div>

                            <div class="  ">
                                <img src="/icons/canais_anunciante/whatsapp-svgrepo-com.svg" alt="Icone Whatsapp" class="rounded-circle"
                                    style="width: 2.5rem; height: 2.5rem;">
                                    <span data-mask="(00) 00000-0000">{{ $anunciante->whatsapp }}</span>
                            </div>
                            <div class=" ">
                                <img src="/icons/canais_anunciante/instagram-svgrepo-com.svg" alt="Icone Instagram" class="rounded-circle"
                                    style="width: 2.5rem; height: 2.5rem;">
                                    <span>{{ $anunciante->instagram }}</span>
                            </div>

                            <div class=" ">
                                <img src="/icons/canais_anunciante/facebook-boxed-svgrepo-com.svg" alt="Icone Facebook" class="rounded-circle"
                                    style="width: 2.5rem; height: 2.5rem;">
                                    <span>{{ $anunciante->facebook }}</span>
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