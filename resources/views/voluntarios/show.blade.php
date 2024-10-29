@extends('layouts.main')

@section('title', 'Voluntário')

@section('content')


<form action="/voluntarios/imprimir/{{$voluntario->id}}" method="GET" enctype="multipart/form-data" class="form-cadastro">

    <div class="container ml-1"> 

        <div class="form-group row ">
            <label for="nome" class="col-sm-1 col-form-label">Nome</label>
            <label for="nome" class="col-sm-6 col-form-label">{{$voluntario->pessoa->nome}}</label>
        </div>
        
        <div class="form-group row ">
            <label for="atividade" class="col-sm-1 col-form-label ">Atividade</label>
            <label class="col-sm-4 col-form-label">{{$voluntario->atividade}}</label>
        </div>

        <div class="form-group row "> 
            <label for="rg" class="col-sm-2 col-form-label">RG</label>
            <label for="nome" class="col-sm-2 col-form-label">{{$voluntario->pessoa->rg}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="orgao_emissor" class="col-sm-2 col-form-label">Órgão Emissor</label>
            <label for="nome" class="col-sm-2 col-form-label">{{$voluntario->pessoa->orgao_emissor}}</label>

            <label for="cpf" class="col-sm-1 col-form-label">CPF</label>
            <label for="nome" class="col-sm-2 col-form-label">{{$voluntario->pessoa->cpf}}</label>
        </div>

        <div class="form-group row "> 
            <label for="data_nascimento" class="col-sm-2 col-form-label text-nowrap">Data de Nascimento</label>
            <label for="data_nascimento" class="col-sm-2 col-form-label">{{$data_nascimento}}</label>
            
            <label for="" class="col-sm-1 col-form-label "></label>
            
            <label for="nacionalidade" class="col-sm-2 col-form-label">Nacionalidade</label>
            <label for="nacionalidade" class="col-sm-2 col-form-label">{{$voluntario->pessoa->nacionalidade}}</label>
        </div>

        <div class="form-group row "> 
            <label for="estado_civil" class="col-sm-2 col-form-label ">Estado Civil</label>
            <label for="estado_civil" class="col-sm-2 col-form-label">{{$voluntario->pessoa->estado_civil}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="profissao" class="col-sm-2 col-form-label text-nowrap">Profissão</label>
            <label for="profissao" class="col-sm-2 col-form-label">{{$voluntario->profissao}}</label>
        </div>

        <div class="form-group row "> 
            <label for="endereco" class="col-sm-2 col-form-label text-nowrap">Endereço</label>
            <label for="endereco" class="col-sm-5 col-form-label">{{$voluntario->pessoa->contato->endereco}}</label>
        </div>

        <div class="form-group row "> 
            <label for="telefone" class="col-sm-2 col-form-label ">Telefone</label>
            <label for="telefone" class="col-sm-2 col-form-label">{{$voluntario->pessoa->contato->telefone}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="email" class="col-sm-2 col-form-label text-nowrap">E-mail</label>
            <label for="email" class="col-sm-3 col-form-label">{{$voluntario->pessoa->contato->email}}</label>
        </div>

        <div class="form-group row">
            <label for="carga_horaria" class="col-sm-2 col-form-label text-nowrap">Carga horaria</label>
            <label for="carga_horaria" class="col-sm-2 col-form-label">{{$voluntario->carga_horaria}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="data_inicio" class="col-sm-2 col-form-label text-nowrap">Data de Início</label>
            <label for="carga_horaria" class="col-sm-2 col-form-label">{{$data_inicio}}</label>
        </div>

        <input type="submit" class="btn btn-primary" value="Gerar PDF">
    </div> <!-- Fim do container com a margem -->   

</form>
@endsection