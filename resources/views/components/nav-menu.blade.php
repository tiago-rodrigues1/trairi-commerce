<nav class="tc-nav navbar navbar-dark navbar-expand-lg bg-tc-green align-items-center px-2">
    <div class="container-fluid">
        <a class="navbar-brand fs-3 text-tc-white" href="/">Trairi Commerce</a>
        <div class="d-flex gap-4 align-items-center">
            @if (session()->get('acesso') == 'cliente')
                <a href="/pedidos/carrinho" class="nav-link d-lg-none">
                    <img src="/icons/shopping-cart.svg" alt="Ícone de carrinho">
                </a>   
            @endif
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @if ($isAuthenticated)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Minha conta
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/usuario/perfil">Perfil</a></li>
                            @if (session()->get('acesso') == 'anunciante')
                                <li><a class="dropdown-item" href="/usuario/perfilAnunciante/{{session()->get('usuario')->anunciante->id}}">Perfil Anunciante</a></li>
                                <li><a class="dropdown-item" href="/produtos/listar">Catálogo</a></li>
                            @else
                                <li><a class="dropdown-item" href="/usuario/favoritos">Favoritos</a></li>
                            @endif
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/pedidos/listar">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/usuario/deslogar">Sair</a>
                    </li>
                @else
                    <a class="nav-link py-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="cursor: pointer;">Fazer login</a>
                @endif
            </ul>
            <form class="d-flex col-12 col-lg-5 mb-2 mb-lg-0" role="search" method="GET" action="/busca/resultados">
                <input class="form-control me-2 bg-tc-white" type="text" name="termo" placeholder="O que você procura ?"
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
            @if (session()->get('acesso') == 'cliente')
                <a href="/pedidos/carrinho" class="nav-link ps-4 pe-2 d-none d-lg-inline">
                    <img src="/icons/shopping-cart.svg" alt="Ícone de carrinho">
                </a>
            @endif
        </div>
    </div>
</nav>

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        {{-- * LOGIN FORM --}}
        <form class="modal-content" id="login" action="/usuario/logar" method="post">
            {{ csrf_field() }}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Login</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="pb-4">
                    <label class="form-label" for="emailLogin">Email</label>
                    <input class="form-control" type="email" name="email" id="emailLogin"
                        placeholder="exemplo@email.exemplo" required>
                </div>
                <x-password-input name="senha" id="senhaLogin" placeholder="Senha cadastrada" required>
                    Senha
                </x-password-input>
            </div>
            <div class="modal-footer border-top-0 justify-content-center">
                <button type="submit" class="btn tc-btn w-100">Entrar</button>
                <span class="py-2">Não está cadastrado? <a class="text-tc-green trocar" href="#"
                        data-id="cadastro">Cadastre-se</a></span>
            </div>
        </form>

        {{-- * CADASTRO FORM --}}
        @if (!session()->has('usuario'))
        <form class="modal-content" id="cadastro" action="/usuario/cadastrar" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Cadastro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <fieldset>
                    <legend class="fw-normal fs-6">Cadastrar como</legend>
                    <div class="form-check form-check-inline">
                        <input class="tipo_cadastro_input form-check-input" type="radio" name="tipoCadastro"
                            id="cadastroCliente" value="cliente" checked>
                        <label class="form-check-label" for="cadastroCliente">
                            Cliente
                        </label>
                    </div>
                    <div class="form-check form-check-inline pb-2">
                        <input class="tipo_cadastro_input form-check-input" type="radio" name="tipoCadastro"
                            id="cadastroAnunciante" value="anunciante">
                        <label class="form-check-label" for="cadastroAnunciante">
                            Anunciante <small>Prestador ou comerciante</small>
                        </label>
                    </div>
                </fieldset>
                <div class="pb-4">
                    <label class="form-label" for="nome">Nome</label>
                    <input class="form-control" type="text" name="nome" id="nome"
                        placeholder="Nome Completo" required>
                </div>
                <div class="pb-4">
                    <label class="form-label" for="email">Email</label>
                    <input class="form-control" type="email" name="email" id="email"
                        placeholder="exemplo@email.exemplo" required>
                </div>
                <div class="pb-4">
                    <x-password-input name="senha" id="senha" placeholder="Min. 8 dígitos" minlength="8"
                        required>
                        Senha
                    </x-password-input>
                </div>
                <div class="pb-4">
                    <x-password-input name="confirmacaoSenha" id="confirmacaoSenha"
                        placeholder="Digite sua senha novamente" required>
                        Confirmar senha
                    </x-password-input>
                </div>
                <div class="pb-4">
                    <label class="form-label" for="nascimento">Nascimento</label>
                    <input class="form-control" type="date" name="nascimento" id="nascimento" required>
                </div>
                <div class="pb-4">
                    <label class="form-label" for="telefone">Telefone</label>
                    <input class="form-control" type="text" name="telefone" id="telefone"
                        placeholder="(dd) xxxxx-xxxx" required data-mask="(00) 00000-0000" minlength="11">
                </div>
                <div class="pb-4 row">
                    <div class="col-6">
                        <label class="form-label" for="cep">CEP</label>
                        <input data-mask="00000-000" class="form-control cep" type="text" name="cep"
                            id="cep" required>
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
                        <label class="form-label" for="numero">Número</label>
                        <input class="form-control" type="number" name="numero" id="numero" required>
                    </div>
                </div>
                <div class="pb-4">
                        <label class="form-label" for="endereco">Endereço</label>
                        <input class="form-control" type="text" name="endereco" id="endereco" required>
                    </div>
                <div class="pb-4 row">
                    <div>
                        <label class="form-label" for="fotoPerfil">Foto de perfil</label>
                        <input type="file" class="file form-control" name="fotoPerfil" id="fotoPerfil">
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
                        <label class="form-label" for="anunciante_nome_fantasia">Nome Fantasia</label>
                        <input class="form-control" type="text" name="anunciante[nome_fantasia]"
                            id="anunciante_nome_fantasia" placeholder="Nome de uso comercial">
                    </div>
                    <div class="pb-4">
                        <label class="form-label" for="anunciante_cpf_cnpj">CPF/CNPJ</label>
                        <input class="form-control" type="text" name="anunciante[cpf_cnpj]"
                            id="anunciante_cpf_cnpj" placeholder="CPF ou CNPJ">
                    </div>
                    <div class="pb-4">
                        <label class="form-label" for="anunciante_descricao">Descrição</label>
                        <textarea class="form-control" type="text" name="anunciante[descricao]" id="anunciante_descricao"
                            placeholder="Descrição sobre seu estabelecimento"></textarea>
                    </div>
                    <div class="pb-4">
                        <label class="form-label" for="anunciante_telefone">Telefone</label>
                        <input class="form-control" type="text" name="anunciante[telefone]"
                            id="anunciante_telefone" placeholder="(dd) xxxxx-xxxx" data-mask="(00) 00000-0000"
                            minlength="11">
                    </div>
                    <div class="pb-4 row">
                        <div class="col-6">
                            <label class="form-label" for="anunciante_cep">CEP</label>
                            <input data-mask="00000-000" class="form-control cep" type="text"
                                name="anunciante[cep]" id="anunciante_cep">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="anunciante_cidade">Cidade</label>
                            <input class="form-control" type="text" name="anunciante[cidade]"
                                id="anunciante_cidade">
                        </div>
                    </div>
                    <div class="pb-4 row">
                        <div class="col-6">
                            <label class="form-label" for="anunciante_bairro">Bairro</label>
                            <input class="form-control" type="text" name="anunciante[bairro]"
                                id="anunciante_bairro">
                        </div>
                        <div class="col-6">
                            <label class="form-label" for="anunciante_numero">Número</label>
                            <input class="form-control" type="number" name="anunciante[numero]" id="anunciante_numero" required>
                        </div>
                    </div>
                    <div class="pb-4">
                        <label class="form-label" for="endereco">Endereço</label>
                        <input class="form-control" type="text" name="anunciante[endereco]" id="anunciante_endereco" required>
                    </div>
                    <div class="pb-4">
                        <label class="form-label" for="anunciante_funcionamento">Funcionamento</label>
                        <input class="form-control" type="text" name="anunciante[funcionamento]"
                            id="anunciante_funcionamento"
                            placeholder="Horário de funcionamento do seu estabelecimento">
                    </div>

                    <legend class="fw-semibold fs-5 py-3">Canais de atendimento</legend>

                        <div class="pb-4">
                            <label class="form-label" for="instagram">Instagram</label>
                            <input class="input-canal form-control" type="text" name="anunciante[instagram]" id="instagram" placeholder="@nome_exemplo">
                        </div>

                        <div class="pb-4">
                            <label class="form-label" for="facebook">Facebook</label>
                            <input class="input-canal form-control" type="text" name="anunciante[facebook]" id="facebook" placeholder="@nome">
                        </div>

                        <div class="pb-4">
                            <label class="form-label" for="whatsapp">Whatsapp</label>
                            <input class="form-control" data-mask="(00) 00000-0000" type="text" name="anunciante[whatsapp]" id="whatsapp" placeholder="(dd) xxxxx-xxxx" minlength="11" required>
                        </div>

                        <div class="pb-4">
                            <label class="form-label" for="email">Email</label>
                            <input class="input-canal form-control" type="email" name="anunciante[email_anunciante]" id="email_anunciante" placeholder="exemplo@email.exemplo">
                        </div>

                </fieldset>
            </div>

            <div class="modal-footer border-top-0 justify-content-center">
                <button type="submit" class="btn tc-btn w-100">Cadastrar</button>
                <span class="py-2">Já tem uma conta? <a class="text-tc-green trocar" href="#"
                        data-id="login">Faça login</a></span>
            </div>
        </form>
        @endif
    </div>
</div>
<div class="modal w-100 h-100 bg-dark bg-opacity-25 fixed" id="image-editor-perfil">
    <div class="modal-dialog overflow-y-scroll modal-xl">
        <div class="modal-content h-100 p-4 vstack align-items-center">
            <div class="w-50 h-50 d-flex flex-column gap-4 align-items-center">
                <div class="d-flex gap-3 align-self-end">
                    <button type="button" class="btn border-2" style="font-size: 0; border-color: var(--tc-green);"
                        id="zoom_in_perfil">
                        <img src="/icons/zoom-in.svg" alt="">
                    </button>
                    <button type="button" class="btn border-2" style="font-size: 0; border-color: var(--tc-green);"
                        id="zoom_out_perfil">
                        <img src="/icons/zoom-out.svg" alt="">
                    </button>
                </div>
                <div class="w-100 h-100" id="img-canvas-perfil">
                </div>
                <div class="hstack align-items-center justify-content-between">
                    <button class="col-6 btn tc-btn-ghost-red" type="button" id="cancel-perfil">Cancelar</button>
                    <button class="col-5 btn tc-btn" type="button" id="crop-perfil">Ok</button>
                </div>
            </div>
        </div>
    </div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.css"
        integrity="sha512-cyzxRvewl+FOKTtpBzYjW6x6IAYUCZy3sGP40hn+DQkqeluGRCax7qztK2ImL64SA+C7kVWdLI6wvdlStawhyw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.13/cropper.min.js"
        integrity="sha512-6lplKUSl86rUVprDIjiW8DuOniNX8UDoRATqZSds/7t6zCQZfaCe3e5zcGaQwxa8Kpn5RTM9Fvl3X2lLV4grPQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/scripts/pages/image_perfil.js"></script>
