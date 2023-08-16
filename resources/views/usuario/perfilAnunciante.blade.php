@extends('templates.base')

@section('title', 'TC | Meu perfil')

@section('content')
    @php
        $numeroEstrelas = $anunciante->avaliacoesClientes()->avg('estrelas');
    @endphp
    <main class="p-4 vstack align-items-center justify-content-center">
        <section class="vstack gap-4 p-4">
            <div class="hstack gap-4">
                <img src="/storage/{{ $anunciante->usuario->foto_perfil_path }}" alt="Imagem de perfil" class="rounded-circle"
                    style="width: 8rem; height: 8rem;">
                <div class="vstack">
                    <h3><b>{{ $anunciante->nome_fantasia }}</b></h3>
                    <div class="w-100 d-flex align-items-center gap-3 pb-3" id="produto-estrelas">
                        @for ($i = 0; $i < 5; $i++)
                            <i class="fa-solid fa-star" style="color: {{ $numeroEstrelas <= $i ? '#DDDDDD' : '#72B01D' }};"></i>
                        @endfor
                    </div>
                    <p>{{ $anunciante->descricao }}</p>
                    <div>
                        <i class="fa-solid fa-location-dot pe-2" style="color: #72b01d;"></i>
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
            @if (session()->get('acesso') == 'cliente')
                <section class="vstack pt-4" id="avaliacoes-anunciante">
                    <h6 class="pb-2">Avalie este anunciante</h6>
                    <div class="d-flex gap-3 py-3 cursor-pointer">
                        <input type="hidden" id="anunciante" value="{{ $anunciante->id }}">
                        @for ($i = 0; $i < 5; $i++)
                            <i role="button" class="btnstar--anunciante fa-solid fa-star fa-xl" style="color: {{ $numeroEstrelas <= $i ? '#DDDDDD' : '#72B01D' }};" data-star-index="{{$i + 1}}"></i>
                        @endfor
                    </div>
                </section>
            @endif
            <div class="vstack pt-4 col-12 col-md-8 col-lg-6 ">
                <h6 class="pb-2">Comentários</h6>
                @if (session()->get('acesso') == 'cliente')
                    <form class="mb-3 ps-3 gap-3 hstack align-items-center" id="enviar-comentario-anunciante" method="POST" action="/anunciante/comentar/{{$anunciante->id}}">
                        {{ csrf_field() }}
                        <img src="/storage/{{ session()->get('usuario')->foto_perfil_path }}" alt="" class="rounded-circle"
                            style="width: 4rem; min-width: 4rem; height: 4rem;">
                        <div class="w-100 d-flex align-items-stretch">
                            <textarea class="h-100 w-100 form-control" id="anunciante-comentario" name="anunciante[comentario]" style="border-radius: .5rem 0 0 .5rem" id="floatingTextarea" placeholder="Adicione um comentário"></textarea>
                            <button type="submit" type="submit" class="btn tc-btn" style="border-radius: 0 .5rem .5rem 0">
                                <i class="fa-regular fa-paper-plane fa-lg" style="color: #FFFFFF;"></i>
                            </button>
                        </div>
                    </form> 
                @endif
                @if (isset($comentarios))
                    <div id="anunciante-comentarios-container">
                        <div id="anunciante-comentarios">
                            @foreach ($comentarios as $comentario)
                                <x-comentario :objectData="$comentario" tipoDeComentario="anunciantes" />
                            @endforeach
                        </div>
                    </div>
                @endif  
            </div>
        </section>
    </main>
    
    <script src="/scripts/pages/perfil.js"></script>

@endsection