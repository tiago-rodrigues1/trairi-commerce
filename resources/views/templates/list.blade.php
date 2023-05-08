@extends('templates.base')

@section('content')
    <main class="d-flex flex-column flex-lg-row max-w-100">
        <x-filter :filters="$filters" />

        <section class="w-100 px-4 px-lg-5 pt-4 flex-1">
            <div class="w-100 d-flex align-items-center justify-content-center">
                <div class="vstack justify-content-between">
                    <h3>
                        @yield('pageLabel')
                    </h3>
                    <h6 class="m-0 fw-normal">@yield('resultsCount') resultados encontrados</h6>
                </div>
                <div class="hstack gap-3 align-items-end">
                    @if (session()->get('acesso') == 'anunciante')
                        <a class="btn tc-btn" href="/produtos/adicionar">Novo</a>
                    @endif
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
            <div class="w-100 pt-5 d-flex align-items-center justify-content-center">
                @yield('items')
            </div>
            {{-- <div class="hstack gap-3 align-items-center justify-content-center pt-5">
            <span>1 de 2</span>
            <button class="text-tc-green bg-transparent border-0">Seguinte ></button>
        </div> --}}
        </section>
    </main>
@endsection
