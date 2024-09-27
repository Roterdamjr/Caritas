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
                    <label for="title">Atividade</label>

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
                        <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço do aluno" required>
                    </div>

                    <label for="fone" class="col-sm-2 col-form-label ">Telefone</label>
                    <div class="col-sm-2">
                        <input type="text" id="fone" name="fone" class="form-control" placeholder="Telefone do aluno" required>
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="mae" class="col-sm-2 col-form-label ">Nome da mãe</label>
                    <div class="col-sm-4">
                        <input type="text" id="mae" name="mae" class="form-control" placeholder="Mãe do aluno" >
                    </div>

                    <label for="pai" class="col-sm-2 col-form-label ">Nome do pai</label>
                    <div class="col-sm-4">
                        <input type="text" id="pai" name="pai" class="form-control" placeholder="Pai do aluno" >
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="responsavel" class="col-sm-2 col-form-label ">Outro responsável</label>
                    <div class="col-sm-4">
                        <input type="text" id="responsavel" name="responsavel" class="form-control" placeholder="Responsável do aluno" >
                    </div>

                    <label for="parentesco" class="col-sm-1 col-form-label ">Parentesco</label>
                    <div class="col-sm-2">
                        <input type="text" id="parentesco" name="parentesco" class="form-control" placeholder="Parentesco do responsável" >
                    </div>

                    <label for="fone_responsavel" class="col-sm-1 col-form-label ">Telefone</label>
                    <div class="col-sm-2">
                        <input type="text" id="fone_responsavel" name="fone_responsavel" class="form-control" placeholder="Fone do responsável" >
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="data_nascimento" class="col-sm-2 col-form-label ">Data Nascimento</label>
                    <div class="col-sm-2">
                        <input type="text" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="Data Nascimento do aluno" >
                    </div> 

                    <label for="estado_civil" class="col-sm-2 col-form-label ">Estado Civil</label>
                    <div class="col-sm-2">
                        <input type="text" id="estado_civil" name="estado_civil" class="form-control" placeholder="Estado Civil do aluno" >
                    </div> 

                    <label for="sexo" class="col-sm-1 col-form-label ">Sexo</label>
                    <div class="col-sm-1">
                        <input type="text" id="sexo" name="sexo" class="form-control" placeholder="Sexo do aluno" >
                    </div> 

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

                    <label for="ano" class="col-sm-1 col-form-label ">Ano</label>
                    <div class="col-sm-1">
                        <input type="text" id="ano" name="ano" class="form-control" placeholder="Ano de escolaridade" >
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
                    <div class="col-sm-2">
                        <input type="text" id="acompanhamento" name="acompanhamento" class="form-control" placeholder="Aompanhamento especial" >
                    </div> 

                    <label for="necessidade" class="col-sm-2 col-form-label ">Necessidade Especial</label>
                    <div class="col-sm-2">
                        <input type="text" id="necessidade" name="necessidade" class="form-control" placeholder="Necessidade Especial" >
                    </div> 

                    <label for="comunidade" class="col-sm-2 col-form-label ">Comunidade</label>
                    <select id="comunidades" name="comunidade">
                        @foreach ([  'Céu Azul','Rato Molhado','Dois de Maio','São João','Matriz'] 
                                as $comunidade)
                            <option value="{{ $comunidade }}">{{ $comunidade }}</option>
                        @endforeach
                    </select>
                </div>


                <input type="submit" class="btn btn-primary" value="Cadastrar aluno">
            </div> <!-- Fim do container com a margem --> 
        </form> 

@endsection

