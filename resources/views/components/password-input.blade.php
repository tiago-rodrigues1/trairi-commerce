<div>
    <label class="form-label" for="{{ $attributes->get('id') }}">{{ $slot }}</label>
    <div class="position-relative">
        <input {{ $attributes->class(['form-control'])->merge(['type' => 'password']) }}>
        <button type="button" data-target="#{{ $attributes->get('id') }}"
            class="showPassword border-0 btn pe-3 m-0 position-absolute top-50 end-0 translate-middle-y">
            <img src="/icons/eye.svg" alt="Ícone de olho">
            <img src="/icons/eye-off.svg" alt="Ícone de olho" style="display: none">
        </button>
    </div>
</div>
