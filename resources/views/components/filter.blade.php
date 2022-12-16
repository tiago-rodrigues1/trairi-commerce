<form class="vstack col-3 col-xl-2 pt-4 ps-5 d-none d-lg-block">
    {{ csrf_field() }}
    <h4 class="">Filtros</h4>
    <ul class="vstack filter-container h-100 w-100 p-0">
        @foreach ($filters as $filter)
            <li class="py-3 d-flex flex-column justify-content-between border-bottom"
                style="max-height: max-content; cursor: pointer;">
                <div class="hstack align-items-center justify-content-between tc_collapse_toggler" data-target="{{str_replace(' ', '_', $filter['label'])}}">
                    <span>{{ $filter['label'] }}</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                </div>

                <div class="tc_collapse" id="{{str_replace(' ', '_', $filter['label'])}}">
                    @foreach ($filter['options'] as $index => $option)
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" name="cidade"
                                id="city_{{ $index }}">
                            <label class="form-check-label" for="city_{{ $index }}">{{ $option }}</label>
                        </div>
                    @endforeach
                </div>
            </li>
        @endforeach
    </ul>
</form>

<script src="/scripts/collapse.js"></script>
<script src="/scripts/jquery.min.js"></script>
