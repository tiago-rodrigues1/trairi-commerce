<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TC | Fazer pedido</title>

    <link rel="stylesheet" href="/styles/bootstrap.min.css">
    <link rel="stylesheet" href="/styles/globals.css">
</head>

<body class="vstack">
    <x-navmenu />

    <form class="vstack py-md-5 align-items-center justify-content-center rounded-3">
        <div class="bg-tc-gray h-100 h-md-auto col-12 col-md-10 col-xl-6 p-4 rounded-3">
            <header class="vstack gap-3 pb-3">
                <h1 class="fs-2 text-tc-green">Seu pedido</h1>
                <div>
                    <h3 class="fs-4 pb-1">Pizza de calabresa no capricho</h3>
                    <h6 class="fw-normal">Por <span>Pizzaria Trairi</span></h6>
                </div>
            </header>
            <main>
                <section class="border-bottom">
                    <p>Valor: <b>R$ 40,00</b></p>
                    <p>Frete: <b>R$ 10,00</b></p>
                    <div class="col-4 pb-3">
                        <label class="form-label" for="quantidade">Quantidade</label>
                        <input class="form-control" type="number" value="1" name="quantidade">
                    </div>
                    <div class="col-4 pb-3">
                        <label class="form-label" for="modo-pagamento">Modo de pagamento</label>
                        <select class="form-select" aria-label="Selecionar modo de pagamento">
                            <option selected>Selecione uma opção</option>
                            <option value="1">Dinheiro</option>
                            <option value="2">Pix</option>
                            <option value="3">Cartão</option>
                        </select>
                    </div>
                    <div class="col-8 pb-3">
                        <label class="form-label" for="observacoes">Deixe um comentário</label>
                        <textarea class="form-control" name="observacoes" id="observacoes" rows="5"></textarea>
                    </div>

                    <p class="fs-5"><b>Total: </b> <span>R$ 50,00</span></p>
                </section>
                <section class="pt-3">
                    <div class="hstack gap-3 align-items-center">
                        <h4 class="text-tc-green fs-4">Seus dados</h4>
                        <a href="#" class="hstack align-items-center gap-1 text-decoration-none text-tc-green">
                            <span class="text-tc-green">Editar</span>
                            <img src="./icons/edit-3.svg" alt="">
                        </a>
                    </div>
                    <ul class="p-0 vstack gap-2">
                        <li>
                            <b>Email: </b>vegeta@gmail.com
                        </li>
                        <li>
                            <b>Telefone: </b>(84) 99988-7766
                        </li>
                        <li>
                            <b>Endereço: </b>Rua dos bobos, Nº 0
                        </li>
                    </ul>
                    <div class="vstack gap-3 py-3">
                        <button class="btn tc-btn">Enviar pedido</button>
                        <button class="btn tc-btn-outline-red">Cancelar</button>
                    </div>
                </section>
            </main>
        </div>
    </form>

    <script src="/scripts/bootstrap.bundle.min.js"></script>
</body>

</html>