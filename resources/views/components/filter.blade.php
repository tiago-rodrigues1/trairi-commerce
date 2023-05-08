<form class="vstack col-3 col-xl-2 pt-4 ps-4 d-none d-lg-block filter-form" method="get" action="/produtos/filtrar">
    <h4>Filtros</h4>
    <ul class="vstack h-100 w-100 p-0">
        @foreach ($filters as $filter)
            <li class="filter-container py-3 d-flex flex-column justify-content-between border-bottom"
                style="max-height: max-content; cursor: pointer;" data-target="#{{$filter['label'][1]}}">
                <div class="hstack align-items-center justify-content-between">
                    <span>{{ $filter['label'][0] }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>

                <div class="filter-item" id="{{$filter['label'][1]}}">
                    <div class="form-check mt-3">
                        <input class="form-check-input" checked type="checkbox" name="{{$filter['label'][1]}}[]" value="*">
                        <label class="form-check-label">Todos</label>
                    </div>
                    @foreach ($filter['options'] as $index => $option)
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="{{$filter['label'][1]}}[]"
                                id="{{ $filter['label'][1].'_'.$index }}" value="{{ $option }}">
                            <label class="form-check-label" for="{{ $filter['label'][1].'_'.$index }}">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>
            </li>
        @endforeach
    </ul>
</form>

<form class="d-lg-none hstack bg-tc-gray justify-content-between align-items-center py-3 px-4">
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
</form>
