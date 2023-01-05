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
                    <li>
                        Olá {{ session()->get('usuario')->nome }}
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
    <div class="modal-dialog modal-lg">
        {{--* LOGIN FORM --}}
        <form class="modal-content" id="login" action="/usuario/logar" method="post">
            {{ csrf_field() }}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="pb-4">
                    <label class="form-label" for="emailLogin">Email</label>
                    <input class="form-control" type="email" name="email" id="emailLogin" placeholder="exemplo@email.exemplo" required>
                </div>
                <div>
                    <label class="form-label" for="senhaLogin">Senha</label>
                    <input class="form-control" type="password" name="senha" id="senhaLogin" placeholder="Senha cadastrada" required>
                </div>
            </div>
            <div class="modal-footer border-top-0 justify-content-center">
                <button type="submit" class="btn tc-btn w-100">Entrar</button>
                <span class="py-2">Não está cadastrado ? <a class="text-tc-green trocar" href="#"
                        data-id="cadastro">Cadastre-se</a></span>
            </div>
        </form>

        {{-- * CADASTRO FORM --}}
        <form class="modal-content" id="cadastro" action="/usuario/cadastrar" method="post">
            {{ csrf_field() }}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <fieldset>
                    <legend class="fw-normal fs-6">Cadastrar como</legend>
                    <div class="form-check form-check-inline">
                        <input class="tipo_cadastro_input form-check-input" type="radio" name="tipoCadastro" id="cadastroCliente"
                            value="cliente" checked>
                        <label class="form-check-label" for="cadastroCliente">
                            Cliente
                        </label>
                    </div>
                    <div class="form-check form-check-inline pb-2">
                        <input class="tipo_cadastro_input form-check-input" type="radio" name="tipoCadastro" id="cadastroAnunciante"
                            value="anunciante">
                        <label class="form-check-label" for="cadastroAnunciante">
                            Anunciante <small>Prestador ou comerciante</small>
                        </label>
                    </div>
                </fieldset>
                <div class="pb-4">
                    <label class="form-label" for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" id="nome" placeholder="Nome Completo" required>
                </div>
                <div class="pb-4">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email" placeholder="exemplo@email.exemplo" required>
                </div>
                <div class="pb-4">
                    <label class="form-label" for="senha">Senha</label>
                    <input class="form-control" type="password" name="senha" id="senha" placeholder="Min. 8 dígitos" minlength="8" required>
                </div>
                <div class="pb-4">
                    <label class="form-label" for="senha">Confirme sua senha</label>
                    <input class="form-control" type="password" name="confirmacaoSenha" id="confirmacaoSenha" placeholder="Digite sua senha novamente" required>
                </div>
                <div class="pb-4">
                    <label class="form-label" for="nascimento">Nascimento</label>
                    <input data-mask="00/00/0000" class="form-control" type="date" name="nascimento" id="nascimento" required>
                </div>
                <div class="pb-4">
                    <label class="form-label" for="telefone">Telefone</label>
                    <input class="form-control" type="text" name="telefone" id="telefone" placeholder="(dd) xxxxx-xxxx" required
                        data-mask="(00) 00000-0000" minlength="11">
                </div>
                <div class="pb-4 row">
                    <div class="col-6">
                        <label class="form-label" for="cep">CEP</label>
                        <input data-mask="00000-000" class="form-control" type="text" name="cep" id="cep" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="cidade">Cidade</label>
                        <input class="form-control" type="text" name="cidade" id="cidade" required>
                    </div>
                </div>
                <div class="pb-4 row">
                    <div class="col-6">
                        <label class="form-label" for="bairro">Bairro</label>
                        <input class="form-control" type="text" name="bairro" id="bairro" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label" for="endereco">Endereço</label>
                        <input class="form-control" type="text" name="endereco" id="endereco" required>
                    </div>
                </div>
                <fieldset>
                    <legend class="fw-normal fs-6">Gênero</legend>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genderMasc"
                            value="masculino" checked>
                        <label class="form-check-label" for="genderMasc">
                            Masculino
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genderFem"
                            value="feminino">
                        <label class="form-check-label" for="genderFem">
                            Feminino
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="genero" id="genderOther"
                            value="não declarado">
                        <label class="form-check-label" for="genderOther">
                            Não declarado
                        </label>
                    </div>
                </fieldset>
                <fieldset id="camposAnunciante" style="display: none;">
                    <legend class="fw-semibold fs-5 py-3">Seção para anunciantes</legend>
                    <div class="pb-4">
                        <label class="form-label" for="nome_fantasia">Nome Fantasia</label>
                        <input class="form-control" type="text" name="anunciante.nome_fantasia" id="nome_fantasia" placeholder="Nome Completo" required>
                    </div>
                    <div class="pb-4">
                        <label class="form-label" for="anunciante.descricao">Descrição</label>
                        <textarea class="form-control" type="text" name="anunciante.descricao" id="anunciante.descricao" placeholder="Descrição sobre seu estabelecimento" required></textarea>
                    </div>
                    <div class="pb-4">
                        <label class="form-label" for="anunciante.telefone">Telefone</label>
                        <input class="form-control" type="text" name="anunciante.telefone" id="anunciante.telefone" placeholder="(dd) xxxxx-xxxx" required
                            data-mask="(00) 00000-0000" minlength="11">
                    </div>
                    <div class="pb-4 row">
                        <div class="col-6">
                            <label class="form-label" for="anunciante.cep">CEP</label>
                            <input data-mask="00000-000" class="form-control" type="text" name="anunciante.cep" id="anunciante.cep" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="anunciante.cidade">Cidade</label>
                            <input class="form-control" type="text" name="anunciante.cidade" id="anunciante.cidade" required>
                        </div>
                    </div>
                    <div class="pb-4 row">
                        <div class="col-6">
                            <label class="form-label" for="anunciante.bairro">Bairro</label>
                            <input class="form-control" type="text" name="anunciante.bairro" id="anunciante.bairro" required>
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="anunciante.endereco">Endereço</label>
                            <input class="form-control" type="text" name="anunciante.endereco" id="anunciante.endereco" required>
                        </div>
                    </div>
                    <div class="pb-4">
                        <label class="form-label" for="anunciante.funcionamento">Funcionamento</label>
                        <input class="form-control" type="text" name="anunciante.funcionamento" id="anunciante.funcionamento" placeholder="Horário de funcionamento do seu estabelecimento" required>
                    </div>
                    <div class="pb-4">
                        <label class="form-label" for="cpf_cnpj">CPF/CNPJ</label>
                        <input class="form-control" type="text" name="cpf_cnpj" id="cpf_cnpj" placeholder="CPF ou CNPJ" required>
                    </div>
                </fieldset>
            </div>
            <div class="modal-footer border-top-0 justify-content-center">
                <button type="submit" class="btn tc-btn w-100">Cadastrar</button>
                <span class="py-2">Já tem uma conta ? <a class="text-tc-green trocar" href="#"
                        data-id="login">Faça login</a></span>
            </div>
        </form>
    </div>
</div>

<script src="/scripts/home.js"></script>