<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TC | Comprovar pedido</title>

    <link rel="stylesheet" href="/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/globals.css">
</head>

<body class="vstack">
    <x-navmenu />

    <form class="vstack py-md-5 align-items-center justify-content-center rounded-3">
        <div class="bg-tc-gray h-100 h-md-auto col-12 col-md-10 col-xl-6 p-4 rounded-3">
            <header class="text-tc-green-dark">
        <h1 class="fs-1">Comprove sua compra</h1 class="fs-1">
        <p class="tc-light-text small">Pedido feito dia 04/07/2022 às 19:33</p>
    </header>

    <main class="vstack">
        <section class="border-bottom">
            <p>
                <b>Produto:</b> Pizza de calabresa 12 fatias no capricho
            </p>
            <p>
                <b>Quantidade:</b> 1
            </p>
            <p>
                <b>Valor:</b> R$ 40,00
            </p>
            <p>
                <b>Vendido por:</b> Pizarria Trairi
            </p>
        </section>
        <section class="pt-2">
            <div>
                <h2 class="fs-3 fw-normal text-tc-green-dark">Avalie sua experiência</h2>
                <button class="btn btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#0D0A0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                </button>
                <button class="btn btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#0D0A0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                </button>
                <button class="btn btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#0D0A0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                </button>
                <button class="btn btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#0D0A0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                </button>
                <button class="btn btn-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="#0D0A0B" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="star">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                        </polygon>
                    </svg>
                </button>
            </div>

            <div class="pt-4 col-12 col-md-8 col-lg-6">
                <label for="comentario" class="form-label text-tc-green-dark">Deixe um comentário</label>
                <textarea name="coment" id="coment" class="form-control" rows="5"></textarea>
            </div>
        </section>
        <section class="col-12 col-md-8 col-lg-6 vstack gap-3 align-self-center py-4">
            <button class="btn tc-btn">Enviar</button>
            <button class="btn tc-btn-ghost-red">Não reconheço este pedido</button>
        </section>
    </main>
        </div>
    </form>

    <script src="/scripts/bootstrap.bundle.min.js"></script>
</body>

</html>