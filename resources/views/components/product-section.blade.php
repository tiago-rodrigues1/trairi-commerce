<section class="col-12 col-lg-9 col-xl-10 justify-content-center">
    @if ($sectionTitle != null)
        <h1 class="fs-3 pb-4">{{ $sectionTitle }}</h1>
    @endif
    
    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4 g-4 justify-content-center justify-content-md-start">
        {{ $slot }}
    </div>
</section>