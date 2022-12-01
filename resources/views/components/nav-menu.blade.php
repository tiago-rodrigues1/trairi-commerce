<nav class="tc-nav navbar navbar-dark navbar-expand-lg bg-tc-green align-items-center px-2 mb-">
    <div class="container-fluid">
        <h1 class="navbar-brand fs-3 text-tc-white">Trairi Commerce</h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Produtos/Serviços</a>
                </li>
                <li class="nav-item">
                    @if ($isAuthenticated)
                        <a class="nav-link" href="#">Sua conta</a>
                    @else
                        <a class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                            style="cursor: pointer;">Fazer login</a>
                    @endif
                </li>
                @if ($isAuthenticated)
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Notificações
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pedidos</a>
                    </li>
                @endif
            </ul>
            <form class="d-flex col-12 col-lg-5 mb-2" role="search">
                <input class="form-control me-2 bg-tc-white" type="search" placeholder="O que você procura ?"
                    aria-label="Search">
                <button class="btn bg-tc-green-dark px-4 border-0" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="#F7F7F7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</nav>
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="pb-4">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email">
                </div>
                <div>
                    <label class="form-label" for="password">Senha</label>
                    <input class="form-control" type="password" name="password" id="password">
                </div>
            </div>
            <div class="modal-footer border-top-0 justify-content-center">
                <button type="button" class="btn tc-btn w-100">Entrar</button>
                <span class="py-2">Não está cadastrado ? <a class="text-tc-green" href="#">Cadastra-se</a></span>
            </div>
        </div>
    </div>
</div>
