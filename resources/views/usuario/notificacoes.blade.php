<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notificações</title>

    <link rel="stylesheet" href="/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/globals.css">
</head>

<body>
    <x-nav-menu isAuthenticated=0 />
    <main class="p-4 w-100">
        <section class="hstack align-items-center justify-content-between">
            <div>
                <h1 class="fs-3">Notificações</h1>
                <h6>12 resultados encontrados</h6>
            </div>
            <div class="col-2 d-none d-lg-block">
                <label for="sortOpts" class="form-label">Ordenar</label>
                <select class="form-select" name="sortOpts" id="sortOpts">
                    <option value="">Mais recente</option>
                    <option value="">Menos recente</option>
                </select>
            </div>
        </section>
        <section class="w-100 pt-4">
            <ul class="p-0 w-100 vstack gap-3">
                <li class="bg-tc-gray w-100 rounded-3 p-3 hstack align-items-center">
                    <div class="border-end col-6 col-sm-4 col-md-3 col-lg-2 pe-2">
                        <div class="vstack gap-1">
                            <p class="fw-bold m-0">Seu pedido foi aceito!</p>
                            <p>de <span class="text-tc-green">Bruce Wayne</span></p>
                        </div>
                        <div class="">
                            <span>17/02/2022</span>
                            <span>às 20:30</span>
                        </div>
                    </div>
                    <div class="ps-3 vstack justify-content-between">
                        <p class="m-0">Seu pedido de 1 pizza de calabresa no capricho foi aceito!</p>
                        <span class="small fw-bold">Nº do pedido: 123321</span>
                    </div>
                </li>
                <li class="bg-tc-gray w-100 rounded-3 p-3 hstack align-items-center">
                    <div class="border-end col-6 col-sm-4 col-md-3 col-lg-2 pe-2">
                        <div class="vstack gap-1">
                            <p class="fw-bold m-0">Seu pedido foi aceito!</p>
                            <p>de <span class="text-tc-green">Bruce Wayne</span></p>
                        </div>
                        <div class="">
                            <span>17/02/2022</span>
                            <span>às 20:30</span>
                        </div>
                    </div>
                    <div class="ps-3 vstack justify-content-between">
                        <p class="m-0">Seu pedido de 1 pizza de calabresa no capricho foi aceito!</p>
                        <span class="small fw-bold">Nº do pedido: 123321</span>
                    </div>
                </li>
                <li class="bg-tc-gray w-100 rounded-3 p-3 hstack align-items-center">
                    <div class="border-end col-6 col-sm-4 col-md-3 col-lg-2 pe-2">
                        <div class="vstack gap-1">
                            <p class="fw-bold m-0">Seu pedido foi aceito!</p>
                            <p>de <span class="text-tc-green">Bruce Wayne</span></p>
                        </div>
                        <div class="">
                            <span>17/02/2022</span>
                            <span>às 20:30</span>
                        </div>
                    </div>
                    <div class="ps-3 vstack justify-content-between">
                        <p class="m-0">Seu pedido de 1 pizza de calabresa no capricho foi aceito!</p>
                        <span class="small fw-bold">Nº do pedido: 123321</span>
                    </div>
                </li>
            </ul>
        </section>
    </main>

    <script src="/scripts/bootstrap.bundle.min.js"></script>
</body>

</html>