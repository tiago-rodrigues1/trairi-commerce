<?php
$filters = [
    [
        'label' => 'Cidade',
        'options' => ['Santa Cruz', 'São Bento'],
    ],
    [
        'label' => 'Modo de pagamento',
        'options' => ['Pix', 'Dinheiro', 'Cartão'],
    ],
];
?>

@extends('templates.base')

@section('title', 'TC | Seu catálogo')

@section('content')
    <main class="d-flex flex-column flex-lg-row max-w-100">
        <x-filter :filters="$filters" />

        <section class="d-lg-none hstack bg-tc-gray justify-content-between align-items-center py-3 px-4">
            <div class="hstack gap-3">
                <span>Filtrar</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-sliders">
                    <line x1="4" y1="21" x2="4" y2="14"></line>
                    <line x1="4" y1="10" x2="4" y2="3"></line>
                    <line x1="12" y1="21" x2="12" y2="12"></line>
                    <line x1="12" y1="8" x2="12" y2="3"></line>
                    <line x1="20" y1="21" x2="20" y2="16"></line>
                    <line x1="20" y1="12" x2="20" y2="3"></line>
                    <line x1="1" y1="14" x2="7" y2="14"></line>
                    <line x1="9" y1="8" x2="15" y2="8"></line>
                    <line x1="17" y1="16" x2="23" y2="16"></line>
                </svg>
            </div>
            <div class="hstack gap-3">
                <span>Ordenar</span>
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                    stroke="#000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                    class="feather feather-trending-up">
                    <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                    <polyline points="17 6 23 6 23 12"></polyline>
                </svg>
            </div>
        </section>
        <section class="col-12 col-lg-9 col-xl-10 px-4 px-lg-5 pt-4">
            <div class="w-100 d-flex align-items-center justify-content-center">
                <div class="vstack">
                    <h3>
                        Seu catálogo
                    </h3>
                    <h6 class="m-0">12 resultados encontrados</h6>
                </div>
                <div class="hstack gap-3 align-items-end">
                    <a class="btn tc-btn" href="/produtos/adicionar">Novo</a>
                    <div class="d-none d-lg-flex flex-column">
                        <label for="sortOpts" class="form-label">Ordenar</label>
                        <select class="form-select" name="sortOpts" id="sortOpts">
                            <option value="">Mais pedidos</option>
                            <option value="">Menor preço</option>
                            <option value="">Maior preço</option>
                            <option value="">Avaliação</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 pt-4 m-0">
                <x-card-produto-catalogo />
            </div>
            <div class="hstack gap-3 align-items-center justify-content-center pt-5">
                <span>1 de 2</span>
                <button class="text-tc-green bg-transparent border-0">Seguinte ></button>
            </div>
        </section>
    </main>
@endsection
