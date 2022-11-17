<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="./styles/bootstrap.min.css">
    <link rel="stylesheet" href="./styles/globals.css">
</head>

<body>
    <nav class="tc-nav navbar navbar-dark navbar-expand-lg bg-tc-green align-items-center px-2 mb-">
        <div class="container-fluid">
            <h1 class="navbar-brand fs-3 text-tc-white">Trairi Commerce</h1>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produtos/Serviços</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Sua conta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Notificações
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pedidos</a>
                    </li>
                </ul>
                <form class="d-flex col-12 col-lg-5 mb-2" role="search">
                    <input class="form-control me-2 bg-tc-white" type="search" placeholder="O que você procura ?"
                        aria-label="Search">
                    <button class="btn bg-tc-green-dark px-4 border-0" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="#F7F7F7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </nav>
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

    <script src="./scripts/bootstrap.bundle.min.js"></script>
</body>

</html>