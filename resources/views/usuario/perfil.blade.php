@extends('templates.base')

@section('title', 'TC | Meu perfil')

@section('content')
    @php
        $u = session()->get('usuario');
        $u->nascimento = explode(" ", $u->nascimento)[0];
    @endphp
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
                    <input type="text" class="form-control" name="telefone" id="perfil_telefone" value="{{$u->telefone}}" readonly>
                    <label for="telefone">Telefone</label>
                </div>
            </div>
            <div class="row p-0 mt-0 gx-2 mb-3">
                <div class="form-floating col-6">
                    <input type="text" class="form-control" name="cep" id="perfil_cep" value="{{$u->cep}}" readonly>
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
        </form>
    </main>
@endsection
