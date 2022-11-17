<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/globals.css">
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

    <main class="d-flex flex-column flex-lg-row max-w-100">
        <!-- <filters> -->
            <section class="vstack col-3 col-xl-2 pt-4 ps-4 d-none d-lg-block">
                <h4 class="ps-3">Filtros</h4>
                <ul class="vstack filter-container h-100 w-100 p-0">
                    <li class="px-3 py-4 hstack align-items-center justify-content-between border-bottom">
                        <span>Cidade</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </li>
                    <li class="px-3 py-4 hstack align-items-center justify-content-between border-bottom">
                        <span>Preço</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </li>
                    <li class="px-3 py-4 hstack align-items-center justify-content-between border-bottom">
                        <span>Modo de pagamento</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </li>
                    <li class="px-3 py-4 hstack align-items-center justify-content-between border-bottom">
                        <span>Avaliação</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-down">
                            <polyline points="6 9 12 15 18 9"></polyline>
                        </svg>
                    </li>
                </ul>
            </section>
    
            <section class="d-lg-none hstack bg-tc-gray justify-content-between align-items-center py-3 px-4">
                <div class="hstack gap-3">
                    <span>Filtrar</span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#000"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-sliders">
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#000"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline>
                        <polyline points="17 6 23 6 23 12"></polyline>
                    </svg>
                </div>
            </section>
        <!-- </filters> -->
        <section class="col-12 col-lg-9 col-xl-10 px-4 px-lg-5 pt-4">
            <div class="w-100 d-flex align-items-center justify-content-center">
                <div class="vstack">
                    <h3>
                        Pizza
                    </h3>
                    <h6>12 resultados encontrados</h6>
                </div>
                <div class="col-2 d-none d-lg-block">
                    <label for="sortOpts" class="form-label">Ordenar</label>
                    <select class="form-select" name="sortOpts" id="sortOpts">
                        <option value="">Mais pedidos</option>
                        <option value="">Menor preço</option>
                        <option value="">Maior preço</option>
                        <option value="">Avaliação</option>
                    </select>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3 row-cols-xl-4 pt-4">
                <article class="card p-0 mx-2 my-2">
                    <img src="/images/pizza.jpg" alt="Pizza" class="card-img-top">
            
                    <main class="p-4 bg-tc-gray vstack gap-3 card-body">
                        <section class="hstack align-items-center justify-content-between">
                            <h4 class="card-price">R$ 40,00</h4>
                            <span>5 x</span>
                        </section>
                        <section class="vstack gap-2">
                            <span>Por Pizzaria Trairi</span>
                            <span>Santa Cruz</span>
                        </section>
                        <hr>
                        <section class="vstack gap-1">
                            <h6>Aceitamos</h6>
                            <div class="w-100 hstack align-items-center justify-content-evenly">
                                <span class="d-flex align-items-center justify-content-center badge bg-success bg-opacity-50 p-2 rounded-2">
                                    dinheiro
                                </span>
                                <span class="d-flex align-items-center justify-content-center badge bg-danger bg-opacity-50 p-2 rounded-2">
                                    pix
                                </span>
                                <span class="d-flex align-items-center justify-content-center badge bg-primary bg-opacity-50 p-2 rounded-2">
                                    cartões
                                </span>
                            </div>
                        </section>
                    </main>
                </article>
                <article class="card p-0 mx-2 my-2">
                    <img src="/images/pizza.jpg" alt="Pizza" class="card-img-top">
            
                    <main class="p-4 bg-tc-gray vstack gap-3 card-body">
                        <section class="hstack align-items-center justify-content-between">
                            <h4 class="card-price">R$ 40,00</h4>
                            <span>5 x</span>
                        </section>
                        <section class="vstack gap-2">
                            <span>Por Pizzaria Trairi</span>
                            <span>Santa Cruz</span>
                        </section>
                        <hr>
                        <section class="vstack gap-1">
                            <h6>Aceitamos</h6>
                            <div class="w-100 hstack align-items-center justify-content-evenly">
                                <span class="d-flex align-items-center justify-content-center badge bg-success bg-opacity-50 p-2 rounded-2">
                                    dinheiro
                                </span>
                                <span class="d-flex align-items-center justify-content-center badge bg-danger bg-opacity-50 p-2 rounded-2">
                                    pix
                                </span>
                                <span class="d-flex align-items-center justify-content-center badge bg-primary bg-opacity-50 p-2 rounded-2">
                                    cartões
                                </span>
                            </div>
                        </section>
                    </main>
                </article>
                <article class="card p-0 mx-2 my-2">
                    <img src="/images/pizza.jpg" alt="Pizza" class="card-img-top">
            
                    <main class="p-4 bg-tc-gray vstack gap-3 card-body">
                        <section class="hstack align-items-center justify-content-between">
                            <h4 class="card-price">R$ 40,00</h4>
                            <span>5 x</span>
                        </section>
                        <section class="vstack gap-2">
                            <span>Por Pizzaria Trairi</span>
                            <span>Santa Cruz</span>
                        </section>
                        <hr>
                        <section class="vstack gap-1">
                            <h6>Aceitamos</h6>
                            <div class="w-100 hstack align-items-center justify-content-evenly">
                                <span class="d-flex align-items-center justify-content-center badge bg-success bg-opacity-50 p-2 rounded-2">
                                    dinheiro
                                </span>
                                <span class="d-flex align-items-center justify-content-center badge bg-danger bg-opacity-50 p-2 rounded-2">
                                    pix
                                </span>
                                <span class="d-flex align-items-center justify-content-center badge bg-primary bg-opacity-50 p-2 rounded-2">
                                    cartões
                                </span>
                            </div>
                        </section>
                    </main>
                </article>
            </div>
            <div class="hstack gap-3 align-items-center justify-content-center pt-5">
                <span>1 de 2</span>
                <button class="text-tc-green bg-transparent border-0">Seguinte ></button>
            </div>
        </section>
    </main>

    <script src="/scripts/bootstrap.bundle.min.js"></script>
</body>

</html>