@extends('layouts.main')

@section('title', 'Aluno')

@section('content')

<body class="antialiased">

<form action="/alunos/imprimir/{{$aluno->id}}" method="GET" enctype="multipart/form-data" class="form-cadastro">

    <div class="container ml-1"> 

        <div class="form-group row"> 
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="" class="col-sm-2 col-form-label "></label>

            <label for="data_nascimento" class="col-sm-2 col-form-label ">Data de Nascimento</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>
        </div>

        <div class="form-group row"> 
            <label for="nome_social" class="col-sm-2 col-form-label">Nome Social</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>
        </div>

        <br></bR>

        <div class="form-group row ">
            <label for="atividade" class="col-sm-2 col-form-label ">Atividade</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>
            
            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="atividade_dia_semana" class="col-sm-1 col-form-label ">Dia</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>
        </div>

        <div class="form-group row ">
            <label class="col-sm-2 col-form-label ">Turno</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label class="col-sm-1 col-form-label ">Horário</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

        </div>

        <br></bR>
        <div class="form-group row "> 

            <label for="estado_civil" class="col-sm-2 col-form-label ">Estado Civil</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="cor" class="col-sm-1 col-form-label ">Cor</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="sexo" class="col-sm-1 col-form-label ">Sexo</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

        </div>
        <br></bR>
        <div class="form-group row "> 
            <label for="endereco" class="col-sm-2 col-form-label ">Endereço</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>
            
            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="comunidade" class="col-sm-2 col-form-label ">Comunidade</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

        </div>

        <div class="form-group row "> 
            <label for="telefone" class="col-sm-2 col-form-label ">Telefone</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="" class="col-sm-4 col-form-label "></label>

            <label for="email" class="col-sm-1 col-form-label ">Email</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

        </div>
        <br></bR>
        <div class="form-group row "> 
            <label for="nome_mae" class="col-sm-2 col-form-label ">Mãe</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="nome_pai" class="col-sm-1 col-form-label ">Pai</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>
        </div>

        <div class="form-group row "> 
            <label for="nome_responsavel" class="col-sm-2 col-form-label ">Outro responsável</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="parentesco_responsavel" class="col-sm-1 col-form-label ">Parentesco</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="telefone_responsavel" class="col-sm-1 col-form-label ">Telefone</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

        </div>
        <br></bR>

        <div class="form-group row "> 
            <label for="profissao" class="col-sm-2 col-form-label ">Profissão</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

        </div>

        <div class="form-group row "> 
            <label for="escolaridade" class="col-sm-2 col-form-label ">Escolaridade</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="" class="col-sm-1 col-form-label ">Ano</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>

            <label for="turno" class="col-sm-1 col-form-label ">Turno</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

        </div>
        <br></bR>
        <div class="form-group row "> 
            <label for="clinica" class="col-sm-2 col-form-label ">Clínica</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>
        </div>

        <div class="form-group row "> 
            <label for="beneficio" class="col-sm-2 col-form-label">Benefício Gov.</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="" class="col-sm-1 col-form-label "></label>
            
            <label for="necessidade" class="col-sm-2 col-form-label ">Necessidade</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>
        </div> 
        <br></bR>
        <div class="form-group row "> 
            <label for="uniforme_body" class="col-sm-2 col-form-label ">Body</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="uniforme_saia" class="col-sm-1 col-form-label ">Saia</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="uniforme_camisa" class="col-sm-1 col-form-label ">Camisa</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>

            <label for="uniforme_calcado" class="col-sm-1 col-form-label ">Calçado</label>
            <label class="col-sm-4 col-form-label">{{$aluno->pessoa->nome}}</label>
        </div>  

        <input type="submit" class="btn btn-primary" value="Gerar PDF">
    </div> <!-- Fim do container com a margem --> 

</form>

@endsection