<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar produto</title>

    <link rel="stylesheet" href="/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/globals.css">
</head>

<body>
    @if ($errors->any())
        <div class="toast-container position-fixed top-0 start-50 translate-middle-x p-3">
            <div id="error" class="toast bg-tc-red text-tc-white" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header bg-tc-red text-tc-white">
                    <strong class="me-auto">Erro</strong>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <x-nav-menu isAuthenticated="{{ session()->has('usuario') ? 1 : 0 }}" />

    <main class="p-5 vstack gap-5">
        <section class="col-12 col-lg-9 col-xl-10">
            <h1 class="fs-3 pb-4">Produtos mais vendidos</h1>
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 gap-lg-4">
                <x-cardproduto />
                <x-cardproduto />
                <x-cardproduto />
            </div>
        </section>
        <section class="col-12 col-lg-9 col-xl-10">
            <h1 class="fs-3 pb-4">Serviços mais solicitados</h1>
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 gap-lg-4">
                <x-cardproduto />
                <x-cardproduto />
                <x-cardproduto />
            </div>
        </section>
        <section class="col-12 col-lg-9 col-xl-10">
            <h1 class="fs-3 pb-4">Produtos mais vendidos</h1>
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 gap-lg-4">
                <x-cardproduto />
                <x-cardproduto />
                <x-cardproduto />
            </div>
        </section>
    </main>
    <script src="/scripts/jquery.min.js"></script>
    <script src="/scripts/bootstrap.bundle.min.js"></script>
    @if ($errors->any())
        <script>
            toast = new bootstrap.Toast(document.getElementById('error'));
            toast.show()
        </script>
    @endif
</body>

</html>
