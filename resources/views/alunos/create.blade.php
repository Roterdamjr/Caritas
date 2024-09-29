@extends('layouts.main')

@section('title', 'Cadastrar Aluno')

@section('content')

    <body class="antialiased">
        
        <form action="/alunos" method="POST" enctype="multipart/form-data">
        @csrf 

            <div class="container ml-5"> 

                <div class="form-group row"> 
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-6">
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do aluno" required>
                    </div>
                </div>

                <div class="form-group">

                    <div class="form-group row"> 
                        @foreach (['Arte que Ajuda', 'Ação de Caritas', 'Ballet', 'Biblioteca Com.', 'Canto Coral', 
                                'Flauta Doce', 'Gestação Acolhida', 'Reforço Escolar', 'Sapateado', 'Teatro', 'Violino', 'Violão'] 
                                as $atividade)
                                <div class="col-md-2"> <!-- Exibir 3 itens por linha em telas médias ou maiores -->
                                    <div class="form-check">
                                        <input type="checkbox" name="atividades[]" value="{{ $atividade }}" class="form-check-input">
                                        <label class="form-check-label">{{ $atividade }}</label>
                                    </div>
                                </div>
                        @endforeach
                    </div>

                </div> 

                <div class="form-group row "> 
                    <label for="endereco" class="col-sm-2 col-form-label ">Endereço</label>
                    <div class="col-sm-6">
                        <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço do aluno">
                    </div>

                    <label for="telefone" class="col-sm-2 col-form-label ">Telefone</label>
                    <div class="col-sm-2">
                        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone do aluno">
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="nome_mae" class="col-sm-2 col-form-label ">Nome da mãe</label>
                    <div class="col-sm-4">
                        <input type="text" id="nome_mae" name="nome_mae" class="form-control" placeholder="Nome da Mãe" >
                    </div>

                    <label for="nome_pai" class="col-sm-2 col-form-label ">Nome do pai</label>
                    <div class="col-sm-4">
                        <input type="text" id="nome_pai" name="nome_pai" class="form-control" placeholder="Nome do Pai" >
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="nome_responsavel" class="col-sm-2 col-form-label ">Outro responsável</label>
                    <div class="col-sm-4">
                        <input type="text" id="nome_responsavel" name="nome_responsavel" class="form-control" placeholder="Nome  do Responsável" >
                    </div>

                    <label for="parentesco_responsavel" class="col-sm-1 col-form-label ">Parentesco</label>
                    <div class="col-sm-2">
                        <input type="text" id="parentesco_responsavel" name="parentesco_responsavel" class="form-control" placeholder="Parentesco do responsável" >
                    </div>

                    <label for="telefone_responsavel" class="col-sm-1 col-form-label ">Telefone</label>
                    <div class="col-sm-2">
                        <input type="text" id="telefone_responsavel" name="telefone_responsavel" class="form-control" placeholder="Fone do responsável" >
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="data_nascimento" class="col-sm-2 col-form-label ">Data Nascimento</label>
                    <div class="col-sm-2">
                        <input type="text" id="data_nascimento" name="data_nascimento">
                        
                        @if($errors->has('data_nascimento'))
                            <span class="text-danger">
                                {{ $errors->first('data_nascimento') }}
                            </span>
                        @endif
                        
                        <script>
                            $(document).ready(function(){
                                $("#data_nascimento").inputmask("99/99/9999");  // Máscara no formato DD/MM/YYYY
                            });
                        </script>
                    </div> 

                    <label for="estado_civil" class="col-sm-2 col-form-label ">Estado Civil</label>
                    <div class="col-sm-2">
                        <input type="text" id="estado_civil" name="estado_civil" class="form-control" placeholder="Estado Civil" >
                    </div> 

                    <label for="sexo" class="col-sm-1 col-form-label ">Sexo</label>
                    <select id="sexos" name="sexo">
                        @foreach ([  'M',  'F'] 
                                as $sexo)
                            <option value="{{ $sexo }}">{{ $sexo }}</option>
                        @endforeach
                    </select>

                    <label for="cor" class="col-sm-1 col-form-label ">Cor</label>
                    <div class="col-sm-1">
                        <input type="text" id="cor" name="cor" class="form-control" placeholder="Cor do aluno" >
                    </div> 
                </div>

                <div class="form-group row "> 
                    <label for="profissao" class="col-sm-2 col-form-label ">Profissão</label>
                    <div class="col-sm-2">
                        <input type="text" id="profissao" name="profissao" class="form-control" placeholder="Profissão do aluno" >
                    </div> 

                    <label for="escolaridade" class="col-sm-2 col-form-label ">Escolaridade</label>
                    <select id="escolaridades" name="escolaridade">
                        @foreach ([  'Fund. I completo',  'Fund. I incompleto',  'Fund. II completo',
                                    'Fund. II incompleto','Médio completo',
                                    'Médio incompleto','Superior completo','Superior incompleto'] 
                                as $escolaridade)
                            <option value="{{ $escolaridade }}">{{ $escolaridade }}</option>
                        @endforeach
                    </select>

                    <label for="ano_escolar" class="col-sm-1 col-form-label ">Ano</label>
                    <div class="col-sm-1">
                        <input type="text" id="ano_escolar" name="ano_escolar" class="form-control" placeholder="Ano de escolaridade" >
                    </div> 

                    <label for="turno" class="col-sm-1 col-form-label ">Turno</label>
                    <div class="col-sm-1">
                        <input type="text" id="turno" name="turno" class="form-control" placeholder="Turno da escolaridade" >
                    </div> 
                </div>

                <div class="form-group row "> 
                    <label for="beneficio" class="col-sm-2 col-form-label ">Benefício Gov.</label>
                    <div class="col-sm-3">
                        <input type="text" id="beneficio" name="beneficio" class="form-control" placeholder="Benefício do governo" >
                    </div> 

                    <label for="clinica" class="col-sm-2 col-form-label ">Clínica</label>
                    <div class="col-sm-3">
                        <input type="text" id="clinica" name="clinica" class="form-control" placeholder="Clínica da família" >
                    </div> 
                </div>                

                <div class="form-group row "> 
                    <label for="acompanhamento" class="col-sm-2 col-form-label ">Acompanhamento</label>
                    <div class="col-sm-3">
                        <input type="text" id="acompanhamento" name="acompanhamento" class="form-control" placeholder="Aompanhamento especial" >
                    </div> 

                    <label for="comunidade" class="col-sm-2 col-form-label ">Comunidade</label>
                    <select id="comunidades" name="comunidade">
                        @foreach ([ '', 'Céu Azul','Rato Molhado','Dois de Maio','São João','Matriz'] 
                                as $comunidade)
                            <option value="{{ $comunidade }}">{{ $comunidade }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group row "> 
                    <label for="necessidade" class="col-sm-2 col-form-label ">Necessidade Especial</label>
                    <div class="col-sm-3">
                        <input type="text" id="necessidade" name="necessidade" class="form-control" placeholder="Necessidade Especial" >
                    </div> 
                </div>

                <div class="form-group row "> 
                    <label for="uniforme_body" class="col-sm-2 col-form-label ">Uniforme body</label>
                    <div class="col-sm-1">
                        <input type="text" id="uniforme_body" name="uniformes[]" class="form-control" placeholder="Uniforme body" >
                    </div> 

                    <label for="uniforme_saia" class="col-sm-2 col-form-label ">Uniforme saia</label>
                    <div class="col-sm-1">
                        <input type="text" id="uniforme_saia" name="uniformes[]" class="form-control" placeholder="Uniforme saia" >
                    </div> 

                    <label for="uniforme_camisa" class="col-sm-2 col-form-label ">Uniforme camisa</label>
                    <div class="col-sm-1">
                        <input type="text" id="uniforme_camisa" name="uniformes[]" class="form-control" placeholder="Camisa camisa" >
                    </div> 

                    <label for="uniforme_calcado" class="col-sm-2 col-form-label ">Nr. Calçado</label>
                    <div class="col-sm-1">
                        <input type="text" id="uniforme_calcado" name="uniformes[]" class="form-control" placeholder="Nr calçado" >
                    </div> 
                </div>

                <input type="submit" class="btn btn-primary" value="Cadastrar Aluno">
            </div> <!-- Fim do container com a margem --> 
        </form> 

@endsection

