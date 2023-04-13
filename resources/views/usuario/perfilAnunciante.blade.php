@extends('templates.base')

@section('title', 'TC | Meu perfil')

@section('content')

    <main class="p-4 vstack align-items-center justify-content-center">

        <section class="vstack pt-6">
                    <div class="hstack  gap-4 p-4">
                        <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                            style="width: 8rem; height: 8rem;">
                        <div class="vstack">
                            <div>
                                <span><b>Tak Empresa</b></span>
                            </div>
                            <p>Veio no capricho! Super aprovado!</p>
                        </div>
                    </div>
                    <div class="vstack  bg-tc-gray border rounded-3  align-items-center gap-3 p-3">
                        <span><b>Canais de atendimento</b> </span>
                        <div class="gap-4 p-2 hstack align-items-center justify-content-center">
                            <div class=" gap-1">
                                <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                                    style="width: 2rem; height: 2rem;">
                                    <span></span>
                                    <span>cleitin_junior23</span>
                            </div>

                            <div class=" gap-1 ">
                                <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                                    style="width: 2rem; height: 2rem;">
                                    <span>Facebook:</span>
                                    <span>cleitin_junior23</span>
                            </div>
                        </div>
                        <div class="gap-4 p-2 hstack align-items-center justify-content-center">
                            <div class=" gap-1">
                                <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                                    style="width: 2rem; height: 2rem;">
                                    <span>Whatsapp:</span>
                                    <span>cleitin_junior23</span>
                            </div>

                            <div class="  gap-1">
                                <img src="/images/perfil.jpg" alt="" class="rounded-circle"
                                    style="width: 2rem; height: 2rem;">
                                    <span>Email:</span>
                                    <span>cleitin_junior23</span>
                            </div>
                        </div>

                    </div>
                </section>
        
        
    </main>
    
    <script src="/scripts/pages/perfil.js"></script>

@endsection