@extends('layouts.main')

@section('title', 'Aluno')

@section('content')

<body class="antialiased">


    <div class="container ml-5"> 

        <div class="form-group row"> 
            <label for="nome" class="col-sm-2 col-form-label">Nome: {{$aluno->pessoa->nome}}</label>

        </div>

        <div class="form-group">
            
            <p>Atividades: </p>
            <ul id="item-list">
                @if($aluno->atividades)
                    @foreach($aluno->atividades as $atividade)
                        <li><ion-icon name="play-outline"></ion-icon> {{$atividade}} </li>
                    @endforeach
                @else
                    <li>Sem atividades</li>
                @endif
            </ul>
        </div>

        <div class="form-group row "> 
            <label for="endereco" class="col-sm-3 col-form-label ">Endereço: {{$aluno->pessoa->contato->endereco}}</label>
            <label for="telefone" class="col-sm-3 col-form-label ">Telefone: {{$aluno->pessoa->contato->telefone}}</label>
        </div>

        <div class="form-group row "> 
            <label for="nome_mae" class="col-sm-3 col-form-label ">Nome da mãe: {{$aluno->pessoa->nome_mae}}</label>
            <label for="nome_pai" class="col-sm-3 col-form-label ">Nome do pai: {{$aluno->pessoa->nome_pai}}</label>
        </div>

        <div class="form-group row "> 
            <label for="nome_responsavel" class="col-sm-4 col-form-label ">
                Outro responsável: {{$aluno->pessoa->nome_responsavel}}
            </label>

            <label for="parentesco_responsavel" class="col-sm-3 col-form-label ">
                Parentesco: {{$aluno->pessoa->parentesco_responsavel}}
            </label>

            <label for="telefone_responsavel" class="col-sm-3 col-form-label ">
                Telefone: {{$aluno->pessoa->telefone_responsavel}}
            </label>
        </div>

        <div class="form-group row "> 
            <label for="data_nascimento" class="col-sm-3 col-form-label ">Data Nascimento: {{$data_nascimento}}</label>      
            <label for="estado_civil" class="col-sm-2 col-form-label ">Estado Civil: {{$aluno->pessoa->estado_civil}}</label>
            <label for="sexo" class="col-sm-2 col-form-label ">Sexo: {{$aluno->pessoa->sexo }}</label>
            <label for="cor" class="col-sm-2col-form-label ">Cor: {{$aluno->pessoa->cor}}</label>
        </div>

        <div class="form-group row "> 
            <label for="profissao" class="col-sm-3 col-form-label "> Profissão: {{$aluno->profissao}}</label>
            <label for="escolaridade" class="col-sm-3 col-form-label "> Escolaridade:  {{ $aluno->escolaridade }}</label>
            <label for="ano_escolar" class="col-sm-2 col-form-label "> Ano: {{$aluno->ano_escolar}}</label>
            <label for="turno" class="col-sm-2 col-form-label ">Turno: {{$aluno->turno}}</label>
        </div>

        <div class="form-group row "> 
            <label for="beneficio" class="col-sm-4 col-form-label ">Benefício do Governo: {{$aluno->beneficio}}.</label>
            <label for="clinica" class="col-sm-4 col-form-label ">Clínica: {{$aluno->clinica}}</label>
        </div>                

        <div class="form-group row "> 
            <label for="acompanhamento" class="col-sm-4 col-form-label ">Acompanhamento: {{$aluno->acompanhamento}}</label>
            <label for="comunidade" class="col-sm-4 col-form-label ">Comunidade: {{ $aluno->comunidade }}</label>

        </div>

        <div class="form-group row "> 
            <label for="necessidade_especial" class="col-sm-4 col-form-label ">
                Necessidade Especial: {{$aluno->necessidade_especial}}
            </label>
        </div>

        <div class="form-group row "> 
            <label for="uniforme_body" class="col-sm-3 col-form-label ">
                Uniforme body: {{$aluno->uniformes[0]}}
            </label>
            <label for="uniforme_saia" class="col-sm-3 col-form-label ">
                Uniforme saia: {{$aluno->uniformes[1]}}
            </label>
            <label for="uniforme_camisa" class="col-sm-3 col-form-label ">
                Uniforme camisa: {{$aluno->uniformes[2]}}
            </label>
            <label for="uniforme_calcado" class="col-sm-3 col-form-label ">
                Nr. Calçado: {{$aluno->uniformes[3]}}
            </label>

        </div>


    </div> <!-- Fim do container com a margem --> 
    

@endsection