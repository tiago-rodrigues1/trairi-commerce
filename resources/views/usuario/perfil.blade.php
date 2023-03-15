@extends('templates.base')

@section('title', 'TC | Meu perfil')

@section('content')
    <main class="p-4 vstack align-items-center justify-content-center">
        <form action="" class="col-12 col-md-10 col-xl-6 p-4 rounded-3 d-flex flex-column gap-4" id="perfilform">
            <div class="hstack align-items-center justify-content-between">
                <h1 class="fs-2 text-tc-green">Meu Perfil</h1>
                <button class="btn tc-btn-outline-green allow-edit" type="button" data-formtarget="#perfilform">Editar</button>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nome" id="perfil_nome" value="{{$u->nome}}" readonly>
                <label for="nome">Nome</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="perfil_email" value="{{$u->email}}" readonly>
                <label for="email">Email</label>
            </div>
            <div class="row p-0 mt-0 gx-2 mb-3">
                <div class="form-floating col-6">
                    <input type="date" class="form-control" name="nascimento" id="perfil_nascimento" value="{{$u->nascimento}}" readonly>
                    <label for="nascimento">Data de nascimento</label>
                </div>
                <div class="form-floating col-6">
                    <input type="text" class="form-control" data-mask="(00) 00000-0000" name="telefone" id="perfil_telefone" value="{{$u->telefone}}" readonly>
                    <label for="telefone">Telefone</label>
                </div>
            </div>
            <div class="row p-0 mt-0 gx-2 mb-3">
                <div class="form-floating col-6">
                    <input type="text" class="form-control" data-mask="00000-000" name="cep" id="perfil_cep" value="{{$u->cep}}" readonly>
                    <label for="cep">CEP</label>
                </div>
                <div class="form-floating col-6">
                    <input type="text" class="form-control" name="cidade" id="perfil_cidade" value="{{$u->cidade}}" readonly>
                    <label for="cidade">Cidade</label>
                </div>
            </div>
            <div class="row p-0 mt-0 gx-2 mb-3">
                <div class="form-floating col-6">
                    <input type="text" class="form-control" name="bairro" id="perfil_bairro" value="{{$u->bairro}}" readonly>
                    <label for="bairro">Bairro</label>
                </div>
                <div class="form-floating col-6">
                    <input type="text" class="form-control" name="endereco" id="perfil_endereco" value="{{$u->endereco}}" readonly>
                    <label for="endereco">Endereço</label>
                </div>
            </div>
            <fieldset>
                <legend class="fw-normal fs-6">Gênero</legend>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" disabled type="radio" name="genero" id="perfil_genderMasc" value="masculino" {{$u->genero == "masculino" ? "checked" : ""}} style="opacity: 100;">
                    <label class="form-check-label" for="genderMasc" style="opacity: 100;">
                        Masculino
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" disabled type="radio" name="genero" id="perfil_genderFem" value="feminino" {{$u->genero == "feminino" ? "checked" : ""}} style="opacity: 100;">
                    <label class="form-check-label" for="genderFem" style="opacity: 100;">
                        Feminino
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" disabled type="radio" name="genero" id="perfil_genderOther" value="não declarado" {{$u->genero == "não declarado" ? "checked" : ""}} style="opacity: 100;">
                    <label class="form-check-label" for="genderOther" style="opacity: 100;">
                        Não declarado
                    </label>
                </div>
            </fieldset>
            @if (session()->get('acesso') == "anunciante")
                <fieldset>
                    <legend class="fw-semibold fs-5 py-3">Dados de anunciante</legend>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="anunciante[nome_fantasia]" id="perfil_anunciante_nome_fantasia" value="{{$u->anunciante->nome_fantasia}}" readonly required>
                        <label for="perfil_anunciante_nome_fantasia">Nome Fantasia</label>
                    </div>
                    <fieldset class="pb-4">
                        <legend class="fw-normal fs-6">Tipos de pagamento</legend>
                        @foreach ($u->anunciante->tiposDePagamento as $tipo_pagamento)
                            <div class="form-check">
                                <input class="form-check-input" name="anunciante[tipo_pagamento_id[]]" type="checkbox" value="{{ $tipo_pagamento->id }}" id="check_{{ $tipo_pagamento->id }}" checked disabled style="opacity: 1;">
                                <label class="form-check-label" for="check_{{ $tipo_pagamento->id }}" style="opacity: 1;">{{ $tipo_pagamento->descricao }}</label>
                            </div>
                        @endforeach
                    </fieldset>
                    <div class="mb-3 form-floating">
                        <textarea class="form-control" name="anunciante[descricao]" id="perfil_anunciante_descricao" readonly required style="min-height: 10rem !important">{{$u->anunciante->descricao}}</textarea> 
                        <label for="perfil_anunciante_descricao">Descrição</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="anunciante[taxa_de_entrega]" id="taxa_de_entrega" value="{{$u->anunciante->taxa_de_entrega}}" readonly required>
                        <label for="taxa_de_entrega">Taxa de entrega</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="anunciante[telefone]" id="perfil_anunciante_telefone" data-mask="(00) 00000-0000" value="{{$u->anunciante->telefone}}" readonly required>
                        <label for="perfil_anunciante_telefone">Telefone</label>
                    </div>
                    <div class="mb-3 row p-0 mt-0 gx-2">
                        <div class="form-floating col-6">
                            <input data-mask="00000-000" class="form-control cep" type="text" name="anunciante[cep]" id="perfil_anunciante_cep" value="{{$u->anunciante->cep}}" readonly required>
                            <label for="perfil_anunciante_cep">CEP</label>
                        </div>
                        <div class="form-floating col-6">
                            <input class="form-control" type="text" name="anunciante[cidade]" id="perfil_anunciante_cidade" value="{{$u->anunciante->cidade}}" readonly required>
                            <label for="perfil_anunciante_cidade">Cidade</label>
                        </div>
                    </div>
                    <div class="mb-3 row p-0 mt-0 gx-2">
                        <div class="form-floating col-6">
                            <input class="form-control" type="text" name="anunciante[bairro]" id="perfil_anunciante_bairro" value="{{$u->anunciante->bairro}}" readonly required>
                            <label for="perfil_anunciante_bairro">Bairro</label>
                        </div>
                        <div class="form-floating col-6">
                            <input class="form-control" type="text" name="anunciante[endereco]" id="perfil_anunciante_endereco" value="{{$u->anunciante->endereco}}" readonly required>
                            <label for="perfil_anunciante_endereco">Endereço</label>
                        </div>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="anunciante[funcionamento]" id="perfil_anunciante_funcionamento" value="{{$u->anunciante->funcionamento}}" readonly required>
                        <label for="perfil_anunciante_funcionamento">Funcionamento</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="anunciante[cpf_cnpj]" id="perfil_anunciante_cpf_cnpj" value="{{$u->anunciante->cpf_cnpj}}" readonly required>
                        <label for="perfil_anunciante_cpf_cnpj">CPF/CNPJ</label>
                    </div>
                </fieldset>
            @endif
        </form>
    </main>
    <script src="/scripts/pages/perfil.js"></script>
@endsection
