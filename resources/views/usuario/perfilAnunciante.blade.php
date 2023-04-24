@extends('templates.base')

@section('title', 'TC | Meu perfil')

@section('content')

    <main class="p-4 vstack align-items-center justify-content-center">

        <section class="vstack gap-4 p-4">
                    <div class="hstack gap-4">
                        <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                            style="width: 8rem; height: 8rem;">
                        <div class="vstack">
                            <div>
                                <h3><b>Tak Empresa</b></h3>
                            </div>
                            <p>Veio no capricho! Super aprovado!</p>
                            <span>Localização: Avenida 25 de março</span>
                        </div>
                    </div>
                    <div class="vstack bg-tc-gray border rounded-3  align-items-center gap-2 p-2">
                        <span><b>Canais de atendimento</b> </span>
                        <div class="gap-4 p-2 hstack justify-content-center">
                            <div class=" ">
                                <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                                    style="width: 2.5rem; height: 2.5rem;">
                                    <span>cleitin_junior23</span>
                            </div>

                            <div class="  ">
                                <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                                    style="width: 2.5rem; height: 2.5rem;">
                                    <span>cleitin_junior23</span>
                            </div>
                        </div>
                        <div class="gap-4 p-2 hstack align-items-center justify-content-center">
                            <div class=" ">
                                <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                                    style="width: 2.5rem; height: 2.5rem;">
                                    <span>cleitin_junior23</span>
                            </div>

                            <div class=" ">
                                <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                                    style="width: 2.5rem; height: 2.5rem;">
                                    <span>cleitin_junior23</span>
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