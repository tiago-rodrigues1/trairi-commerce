<form class="vstack col-3 col-xl-2 pt-4 ps-4 d-none d-lg-block filter-form" method="get" action="{{ $action }}">
    <h4>Filtros</h4>
    <a href="{{ $action }}{{ isset($termo) ? "?termo=".$termo : "" }}">Limpar</a>
    @if (isset($termo))
        <input type="hidden" name="termo" value="{{ $termo }}">
    @endif
    <ul class="vstack h-100 w-100 p-0">
        @foreach ($filters as $filter)
            <li class="filter-container py-3 d-flex flex-column justify-content-between border-bottom"
                style="max-height: max-content; cursor: pointer;" data-target="#{{$filter['label'][1]}}">
                <span>{{ $filter['label'][0] }}</span>
                <div class="filter-item" id="filter_{{$filter['label'][1]}}">
					@if (isset($filter['options']))
						@foreach ($filter['options'] as $index => $option)
							@php
								$isChecked = false;
								$filtros = $filtrosUsuario[$filter['label'][1]] ?? [];

								foreach ($filtros as $filtro) {
									if ($filtro == $option) {
										$isChecked = true;
										break;
									}
								}
							@endphp
							<div class="form-check mt-3">
								<input 
									class="form-check-input" 
									{{ $isChecked ? "checked" : "" }} 
									type="checkbox" 
									name="{{ $filter['label'][1] }}[]"
									data-target="#filter_{{$filter['label'][1]}}"
									value="{{ $option == "Todos" ? "*" : $option }}"
								>
								<label class="form-check-label" for="{{ $filter['label'][1].'_'.$index }}">{{ $option }}</label>
							</div>
						@endforeach
					@endif
                </div>
            </li>
        @endforeach
    </ul>
</form>

<form class="filter-form d-lg-none hstack bg-tc-gray justify-content-between align-items-center py-3 px-4" method="get" action="{{ $action }}">
    <button type="button" class="hstack btn p-1 gap-2" data-bs-toggle="modal" data-bs-target="#mb-filters">
        <span>Filtrar</span>
        <i class="fa-solid fa-sliders" style="color: #0a0b0d;"></i>
    </button type="button">
    @if (isset($termo))
        <input type="hidden" name="termo" value="{{ $termo }}">
    @endif
    <!-- Modal -->
    <div class="modal fade" id="mb-filters" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Filtros</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <ul class="vstack h-100 w-100 p-0">
                        @foreach ($filters as $filter)
                            <li class="filter-container py-3 d-flex flex-column justify-content-between border-bottom"
                                style="max-height: max-content; cursor: pointer;" data-target="#{{$filter['label'][1]}}">
                                <span>{{ $filter['label'][0] }}</span>
                                <div class="filter-item" id="filter_{{$filter['label'][1]}}">
                                    @if (isset($filter['options']))
                                        @foreach ($filter['options'] as $index => $option)
                                            @php
                                                $isChecked = false;
                                                $filtros = $filtrosUsuario[$filter['label'][1]] ?? [];
                
                                                foreach ($filtros as $filtro) {
                                                    if ($filtro == $option) {
                                                        $isChecked = true;
                                                        break;
                                                    }
                                                }
                                            @endphp
                                            <div class="form-check mt-3">
                                                <input 
                                                    class="form-check-input" 
                                                    {{ $isChecked ? "checked" : "" }} 
                                                    type="checkbox" 
                                                    name="{{ $filter['label'][1] }}[]"
                                                    data-target="#filter_{{$filter['label'][1]}}"
                                                    value="{{ $option == "Todos" ? "*" : $option }}"
                                                >
                                                <label class="form-check-label" for="{{ $filter['label'][1].'_'.$index }}">{{ $option }}</label>
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ $action }}{{ isset($termo) ? "?termo=".$termo : "" }}">Limpar Filtros</a>
</form>
