<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtro</title>

    <link rel="stylesheet" href="/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/globals.css">
</head>

<body>
<section class="vstack col-3 col-xl-2 pt-4 ps-4 d-none d-lg-block">
                <h4 class="ps-3">Filtros</h4>
                <ul class="vstack filter-container h-100 w-100 p-0">

                    <li class="px-3 py-4 hstack align-items-center justify-content-between border-bottom">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            <span>Cidade</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                    </li>  
                    
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="city" id="santacruz">
                                <label class="form-check-label" for="santacruz">Santa Cruz</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="city" id="tangara">
                                <label class="form-check-label" for="tangara">Tangará</label>
                            </div>
                        </div>
                    </div>


                     <li class="px-3 py-4 hstack align-items-center justify-content-between border-bottom">
                        <button class="btn" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample1" aria-expanded="false" aria-controls="collapseExample">
                            <span>Preço</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"class="feather feather-chevron-down">
                                <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                        </button>
                    </li>  
                    
                    <div class="collapse" id="collapseExample1">
                        <div class="card card-body">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="city" id="santacruz"> <!-- mudar for e o id-->
                                <label class="form-check-label" for="santacruz">Até R$1.000,00 </label>
                            </div>
                        </div>
                    </div>
                    
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


<script src="/scripts/bootstrap.bundle.min.js"></script>
</body>
</html>