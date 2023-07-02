@extends('templates.base')

@section('title', 'TC | Meu perfil')

@section('content')
    <main class="p-4 vstack align-items-center justify-content-center">
        <form action="/usuario/perfil/atualizar" method="post" class="col-12 col-md-10 col-xl-6 p-4 rounded-3 d-flex flex-column gap-4" id="perfilform">
            {{ csrf_field() }}
            <div class="hstack align-items-center justify-content-between">
                <h1 class="fs-2 text-tc-green">Meu Perfil</h1>
                <button class="btn tc-btn-outline-green allow-edit" type="button" data-formtarget="#perfilform">Editar</button>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nome" id="nome" value="{{$u->nome}}" readonly>
                <label for="nome">Nome</label>
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control" name="email" id="email" value="{{$u->email}}" readonly>
                <label for="email">Email</label>
            </div>
            <div class="row p-0 mt-0 gx-2 mb-3">
                <div class="form-floating col-6">
                    <input type="date" class="form-control" name="nascimento" id="nascimento" value="{{$u->nascimento}}" readonly>
                    <label for="nascimento">Data de nascimento</label>
                </div>
                <div class="form-floating col-6">
                    <input type="text" class="form-control" data-mask="(00) 00000-0000" name="telefone" id="telefone" value="{{$u->telefone}}" readonly>
                    <label for="telefone">Telefone</label>
                </div>
            </div>
            <div class="row p-0 mt-0 gx-2 mb-3">
                <div class="form-floating col-6">
                    <input type="text" class="form-control" data-mask="00000-000" name="cep" id="cep" value="{{$u->cep}}" readonly>
                    <label for="cep">CEP</label>
                </div>
                <div class="form-floating col-6">
                    <input type="text" class="form-control" name="cidade" id="cidade" value="{{$u->cidade}}" readonly>
                    <label for="cidade">Cidade</label>
                </div>
            </div>
            <div class="row p-0 mt-0 gx-2 mb-3">
                <div class="form-floating col-6">
                    <input type="text" class="form-control" name="bairro" id="bairro" value="{{$u->bairro}}" readonly>
                    <label for="bairro">Bairro</label>
                </div>
                <div class="form-floating col-6">
                    <input type="text" class="form-control" name="endereco" id="endereco" value="{{$u->endereco}}" readonly>
                    <label for="endereco">Endereço</label>
                </div>
            </div>
            <fieldset>
                <legend class="fw-normal fs-6">Gênero</legend>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" disabled type="radio" name="genero" id="genderMasc" value="masculino" {{$u->genero == "masculino" ? "checked" : ""}} style="opacity: 100;">
                    <label class="form-check-label" for="genderMasc" style="opacity: 100;">
                        Masculino
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" disabled type="radio" name="genero" id="genderFem" value="feminino" {{$u->genero == "feminino" ? "checked" : ""}} style="opacity: 100;">
                    <label class="form-check-label" for="genderFem" style="opacity: 100;">
                        Feminino
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" disabled type="radio" name="genero" id="genderOther" value="não declarado" {{$u->genero == "não declarado" ? "checked" : ""}} style="opacity: 100;">
                    <label class="form-check-label" for="genderOther" style="opacity: 100;">
                        Não declarado
                    </label>
                </div>
            </fieldset>
            @if (session()->get('acesso') == "anunciante")
                <fieldset>
                    <legend class="fw-semibold fs-5 py-3">Dados de anunciante</legend>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="anunciante[nome_fantasia]" id="anunciante_nome_fantasia" value="{{$u->anunciante->nome_fantasia}}" readonly required>
                        <label for="anunciante_nome_fantasia">Nome Fantasia</label>
                    </div>

                    <legend class="fw-normal fs-6">Canais de atendimento</legend>
                        <div class="mb-3 form-floating">
                            <input class="form-control" type="text" name="anunciante[instagram]" placeholder="name@example.com" value="{{$u->anunciante->instagram}}" id="instagram">
                            <label for="instagram">Instagram</label>
                        </div>
                        
                        <div class="mb-3 form-floating">
                            <input class="form-control" type="text" name="anunciante[facebook]" id="facebook" value="{{$u->anunciante->facebook}}">
                            <label for="facebook">Facebook</label>
                        </div>

                        <div class="mb-3 form-floating">
                            <input class="form-control" data-mask="(00) 00000-0000" type="text" name="anunciante[whatsapp]" id="whatsapp" value="{{$u->anunciante->whatsapp}}">
                            <label for="whatsapp">Whatsapp</label>
                        </div>

                        <div class="mb-3 form-floating">
                            <input class="form-control" type="email" name="anunciante[email_anunciante]" id="email_anunciante" value="{{$u->anunciante->email_anunciante}}">
                            <label for="email_anunciante">Email</label>
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
                        <textarea class="form-control" name="anunciante[descricao]" id="anunciante_descricao" readonly required style="min-height: 10rem !important">{{$u->anunciante->descricao}}</textarea> 
                        <label for="anunciante_descricao">Descrição</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="anunciante[telefone]" id="anunciante_telefone" data-mask="(00) 00000-0000" value="{{$u->anunciante->telefone}}" readonly required>
                        <label for="anunciante_telefone">Telefone</label>
                    </div>
                    <div class="mb-3 row p-0 mt-0 gx-2">
                        <div class="form-floating col-6">
                            <input data-mask="00000-000" class="form-control cep" type="text" name="anunciante[cep]" id="anunciante_cep" value="{{$u->anunciante->cep}}" readonly required>
                            <label for="anunciante_cep">CEP</label>
                        </div>
                        <div class="form-floating col-6">
                            <input class="form-control" type="text" name="anunciante[cidade]" id="anunciante_cidade" value="{{$u->anunciante->cidade}}" readonly required>
                            <label for="anunciante_cidade">Cidade</label>
                        </div>
                    </div>
                    <div class="mb-3 row p-0 mt-0 gx-2">
                        <div class="form-floating col-6">
                            <input class="form-control" type="text" name="anunciante[bairro]" id="anunciante_bairro" value="{{$u->anunciante->bairro}}" readonly required>
                            <label for="anunciante_bairro">Bairro</label>
                        </div>
                        <div class="form-floating col-6">
                            <input class="form-control" type="text" name="anunciante[endereco]" id="anunciante_endereco" value="{{$u->anunciante->endereco}}" readonly required>
                            <label for="nunciante_endereco">Endereço</label>
                        </div>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="anunciante[funcionamento]" id="anunciante_funcionamento" value="{{$u->anunciante->funcionamento}}" readonly required>
                        <label for="anunciante_funcionamento">Funcionamento</label>
                    </div>
                    <div class="mb-3 form-floating">
                        <input class="form-control" type="text" name="anunciante[cpf_cnpj]" id="anunciante_cpf_cnpj" value="{{$u->anunciante->cpf_cnpj}}" readonly required>
                        <label for="anunciante_cpf_cnpj">CPF/CNPJ</label>
                    </div>
                </fieldset>
            @endif
        </form>
    </main>
    <script src="/scripts/pages/perfil.js"></script>
@endsection
