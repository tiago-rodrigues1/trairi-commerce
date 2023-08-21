@php
    $numeroEstrelas = $produto->avaliacoesClientes()->avg('estrelas');
@endphp

<div class="modal w-100 h-100 bg-dark bg-opacity-25 fixed" id="detalheProduto_{{ $produto->id }}">
    <div class="modal-dialog overflow-y-scroll modal-xl">
        <div class="modal-content h-100 align-items-center py-3">
            <div class="d-flex flex-column p-4 col-12 col-lg-11">
                <section class="d-flex flex-column w-100">
                    <div class="w-100 vstack gap-3">
                        <div class="vstack">
                            <div class="hstack align-items-center justify-content-between">
                                <h1 class="fs-4">{{ $produto->nome }}</h1>
                                <button type="button" class="btn-close close" aria-label="Close"
                                    data-target="#detalheProduto_{{ $produto->id }}"></button>
                            </div>
                            <div class="py-3" id="produto-estrelas-container">
                                <div class="w-100 d-flex align-items-center gap-3" id="produto-estrelas">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa-solid fa-star fa-lg" style="color: {{ $numeroEstrelas <= $i ? '#DDDDDD' : '#72B01D' }};"></i>
                                    @endfor
                                </div>
                            </div>
                        </div>
                        <div class="vstack gap-3">
                            @if (count($produto->imagens) == 1)
                                <img src="/storage/{{ $produto->imagens[0]->path }}"
                                    alt="Imagem de um {{ $produto->nome }}" class="img-fluid rounded-3 w-100 h-75">
                            @else
                                <div id="carouselExample" class="carousel slide">
                                    <div class="carousel-inner">
                                        @foreach ($produto->imagens as $index => $image)
                                            <div class="carousel-item active">
                                                <img src="/storage/{{ $image->path }}"
                                                    alt="Imagem de um {{ $produto->nome }}"
                                                    class="img-fluid rounded-3 w-100 h-75">
                                            </div>
                                        @endforeach
                                    </div>
                                    <button class="carousel-control-prev" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next" type="button"
                                        data-bs-target="#carouselExample" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="h-100">
                        <div class="mt-3 d-flex align-items-center justify-content-between">
                            <h4 class="m-0">R$ {{ number_format($produto->valor, 2, ',') }}</h4>
                            @if (session()->has('usuario') && session()->get('acesso') != 'anunciante')
                                <button type="button" class="{{ session()->get('usuario')->cliente->produtosFavoritados->contains($produto->id) ? 'favoritado' : '' }} p-1 bg-transparent rounded-3 border favoritar"
                                    style="border-color: #DDDDDD; font-size: 0;" role="favoritar" data-produto_id="{{ $produto->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="#DDDDDD" stroke="#DDDDDD" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart">
                                        <path
                                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                                        </path>
                                    </svg>
                                </button>
                            @endif
                        </div>
                        <span>Taxa de entrega: R$
                            {{ number_format($produto->taxa_de_entrega, 2, ',') }}</span>
                        <div class="mt-3">
                            <p class="mb-2">
                                Por <a href="/usuario/perfilAnunciante/{{ $produto->anunciante->id }}">{{ $produto->anunciante->nome_fantasia }}</a>
                            </p>
                        </div>
                        <div class="pt-2 vstack gap-1">
                            <h6>Aceitamos</h6>
                            <div class="w-100 hstack align-items-center gap-3 flex-wrap">
                                @foreach ($produto->anunciante->tiposDePagamento as $tipo_pagamento)
                                    @if ($tipo_pagamento->id == 1)
                                        <span
                                            class="d-flex align-items-center justify-content-center badge bg-success bg-opacity-50 p-2 rounded-2">
                                            {{ $tipo_pagamento->descricao }}
                                        </span>
                                    @elseif ($tipo_pagamento->id == 2)
                                        <span
                                            class="d-flex align-items-center justify-content-center badge bg-info bg-opacity-50 p-2 rounded-2">
                                            {{ $tipo_pagamento->descricao }}
                                        </span>
                                    @elseif ($tipo_pagamento->id == 3)
                                        <span
                                            class="d-flex align-items-center justify-content-center badge bg-primary bg-opacity-50 p-2 rounded-2">
                                            {{ $tipo_pagamento->descricao }}
                                        </span>
                                    @elseif ($tipo_pagamento->id == 4)
                                        <span
                                            class="d-flex align-items-center justify-content-center badge bg-tc-red bg-opacity-50 p-2 rounded-2">
                                            {{ $tipo_pagamento->descricao }}
                                        </span>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        @if (session()->get('acesso') == 'cliente')
                            <a class="mt-5 btn tc-btn w-100" href="/pedidos/carrinho/{{ $produto->id }}">Adicionar ao carrinho</a>
                        @endif
                    </div>
                </section>
                <section class="mt-5">
                    <div>
                        <h5>Descrição</h5>
                        <p>{{ $produto->descricao }}</p>
                    </div>
                </section>
                @if (session()->get('acesso') == 'cliente')
                    <section class="vstack pt-4" id="avaliacoes-produto">
                        <h6 class="pb-2">Avalie este produto</h6>
                        <div class="d-flex gap-3 py-3 cursor-pointer">
                            @for ($i = 0; $i < 5; $i++)
                                <i role="button" class="btnstar--produto fa-solid fa-star fa-xl" style="color: {{ $numeroEstrelas <= $i ? '#DDDDDD' : '#72B01D' }};" data-star-index="{{$i + 1}}"></i>
                            @endfor
                        </div>
                    </section>
                @endif
                <section class="vstack pt-4">
                    <h6 class="pb-2">Comentários</h6>
                    @if (session()->get('acesso') == 'cliente')
                        <div class="avaliar mb-3 ps-3 gap-3 hstack align-items-center">
                            <img src="/storage/{{ session()->get('usuario')->foto_perfil_path }}" alt="" class="rounded-circle"
                                style="width: 4rem; min-width: 4rem; height: 4rem;">
                            <div class="w-100 d-flex align-items-stretch">
                                <textarea class="h-100 w-100 form-control" id="produto-comentario" name="produto[comentario]" style="border-radius: .5rem 0 0 .5rem" id="floatingTextarea" placeholder="Adicione um comentário"></textarea>
                                <button type="button" id="enviar-avaliacao" class="btn tc-btn" style="border-radius: 0 .5rem .5rem 0">
                                    <i class="fa-regular fa-paper-plane fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </div>
                        </div>
                    @endif
                    @if (isset($comentarios))
                        <div id="comentarios-container">
                            <div id="produtos-comentarios">
                                @foreach ($comentarios as $comentario)
                                    <x-comentario :objectData="$comentario" tipoDeComentario="produtos" />
                                @endforeach
                            </div>
                        </div>
                    @endif  
                </section>
            </div>
        </div>
    </div>
</div>