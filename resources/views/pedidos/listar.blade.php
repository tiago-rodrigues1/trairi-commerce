<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TC | Listar pedidos</title>

    <link rel="stylesheet" href="/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/globals.css">
</head>

<body>
    <x-navmenu />

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
                        Seus pedidos
                    </h3>
                    <h6>12 resultados encontrados</h6>
                </div>
                <div class="col-2 d-none d-lg-block">
                    <label for="sortOpts" class="form-label">Ordenar</label>
                    <select class="form-select" name="sortOpts" id="sortOpts">
                        <option value="">Mais recente</option>
                        <option value="">Menos recente</option>
                        <option value="">Maior preço</option>
                        <option value="">Menor preço</option>
                        <option value="">Nome</option>
                    </select>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-lg-3 gap-4 mt-4">
                <article class="bg-tc-gray rounded-3 p-3 col col-md-4">
                    <div class="hstack">
                        <div class="vstack">
                            <span><b>Calabresa no capricho</b></span>
                            <span>Tiago Rodrigues</span>
                        </div>
                        <div class="vstack text-end">
                            <span>R$ 40,00</span>
                            <span>17/03/2022</span>
                        </div>
                    </div>
                    <hr>
                    <div class="hstack justify-content-between">
                        <span class="text-tc-green">Finalizado</span>
                        <button type="button" class="btn tc-btn">Abrir</button>
                    </div>
                </article>
                <article class="bg-tc-gray rounded-3 p-3 col col-md-4">
                    <div class="hstack">
                        <div class="vstack">
                            <span><b>Calabresa no capricho</b></span>
                            <span>Tiago Rodrigues</span>
                        </div>
                        <div class="vstack text-end">
                            <span>R$ 40,00</span>
                            <span>17/03/2022</span>
                        </div>
                    </div>
                    <hr>
                    <div class="hstack justify-content-between">
                        <span class="text-tc-green">Finalizado</span>
                        <button type="button" class="btn tc-btn">Abrir</button>
                    </div>
                </article>
                <article class="bg-tc-gray rounded-3 p-3 col col-md-4">
                    <div class="hstack">
                        <div class="vstack">
                            <span><b>Calabresa no capricho</b></span>
                            <span>Tiago Rodrigues</span>
                        </div>
                        <div class="vstack text-end">
                            <span>R$ 40,00</span>
                            <span>17/03/2022</span>
                        </div>
                    </div>
                    <hr>
                    <div class="hstack justify-content-between">
                        <span class="text-tc-green">Finalizado</span>
                        <button type="button" class="btn tc-btn">Abrir</button>
                    </div>
                </article>
            </div>
    </main>

    <script src="/scripts/bootstrap.bundle.min.js"></script>
</body>

</html>