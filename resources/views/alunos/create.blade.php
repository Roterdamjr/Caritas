@extends('layouts.main')

@section('title', 'Cadastrar Aluno')

@section('content')

<script>
function toggleInputBeneficio() {
    var inputField = document.getElementById("beneficio");
    inputField.disabled = !inputField.disabled;
}
function toggleInputNecessidade() {
    var inputField = document.getElementById("necessidade");
    inputField.disabled = !inputField.disabled;
}
</script>


    <body class="antialiased"> 
        
        <form action="/alunos" method="POST" enctype="multipart/form-data" class="form-cadastro">
        @csrf 

            <div class="container ml-1"> 

                <div class="form-group row"> 
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-4">
                        <input type="text" id="nome" name="nome" class="form-control"  required>
                    </div>

                    <label for="" class="col-sm-2 col-form-label "></label>

                    <label for="data_nascimento" class="col-sm-2 col-form-label ">Data de Nascimento</label>
                    <div class="col-sm-2">
                        <input type="text" id="data_nascimento" name="data_nascimento" class="form-control">
                        
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
                </div>

                <div class="form-group row"> 
                    <label for="nome_social" class="col-sm-2 col-form-label">Nome Social</label>
                    <div class="col-sm-4">
                        <input type="text" id="nome_social" name="nome_social" class="form-control"  >
                    </div>
                </div>

                <br></bR>

                <div class="form-group row ">
                    <label for="atividade" class="col-sm-2 col-form-label ">Atividade</label>
                    <div class="col-sm-2">
                        <select id="atividade" name="atividade" class="form-control">
                            @foreach (['Arte que Ajuda', 'Ação de Caritas', 'Ballet', 'Biblioteca Com.', 'Canto Coral', 
                                'Flauta Doce', 'Gestação Acolhida', 'Reforço Escolar', 'Sapateado', 'Teatro', 'Violino', 'Violão'] 
                                as $atividade)
                                <option value="{{ $atividade }}">{{ $atividade }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label for="atividade_dia_semana" class="col-sm-1 col-form-label ">Dia</label>
                    <div class="col-sm-2">
                        <select id="atividade_dia_semana" name="atividade_dia_semana" class="form-control">
                            @foreach (['Seg','Ter', 'Qua','Qui','Sex','Sab'] 
                                as $atividade_dia_semana)
                                <option value="{{ $atividade_dia_semana }}">{{ $atividade_dia_semana }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                
                <div class="form-group row ">
                    <label class="col-sm-2 col-form-label ">Turno</label>
                    <div class="col-sm-2">
                        <select id="atividade_turno" name="atividade_turno" class="form-control">
                            @foreach (['Manhã','Tarde'] 
                                as $atividade_turno)
                                <option value="{{ $atividade_turno }}">{{ $atividade_turno }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label class="col-sm-1 col-form-label ">Horário</label>
                    <div class="col-sm-1">
                        <input type="text" id="atividade_horario_ini" name="atividade_horario_ini" class="form-control" 
                        placeholder="Hr início">
                    </div>

                    <label for="atividade_horario_fim" class="col-sm-1 col-form-label text-center" style="display: flex; justify-content: center; align-items: center;">às</label>

                    <div class="col-sm-1">
                        <input type="text" id="atividade_horario_fim" name="atividade_horario_fim" class="form-control" 
                        placeholder="Hr fim">
                    </div>
                </div>
                
                <br></bR>
                <div class="form-group row "> 

                    <label for="estado_civil" class="col-sm-2 col-form-label ">Estado Civil</label>
                    <div class="col-sm-2">
                        <input type="text" id="estado_civil" name="estado_civil" class="form-control" placeholder="Estado Civil" >
                    </div> 

                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label for="cor" class="col-sm-1 col-form-label ">Cor</label>
                    <div class="col-sm-2">
                        <input type="text" id="cor" name="cor" class="form-control" placeholder="Cor do aluno" >
                    </div> 

                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label for="sexo" class="col-sm-1 col-form-label ">Sexo</label>
                    <div class="col-sm-2">
                        <select id="sexos" name="sexo" class="form-control">
                            @foreach ([  'Masculino',  'Feminino', 'Outro'] 
                                    as $sexo)
                                <option value="{{ $sexo }}">{{ $sexo }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <br></bR>
                <div class="form-group row "> 
                    <label for="endereco" class="col-sm-2 col-form-label ">Endereço</label>
                    <div class="col-sm-5">
                        <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço do aluno">
                    </div>
                    
                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label for="comunidade" class="col-sm-2 col-form-label ">Comunidade</label>
                    <div class="col-sm-2">
                        <select id="comunidades" name="comunidade" class="form-control">
                            @foreach ([ '', 'Céu Azul','Rato Molhado','Dois de Maio','São João','Matriz'] 
                                    as $comunidade)
                                <option value="{{ $comunidade }}">{{ $comunidade }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="telefone" class="col-sm-2 col-form-label ">Telefone</label>
                    <div class="col-sm-2">
                        <input type="text" id="telefone" name="telefone" class="form-control"  placeholder="Telefone do aluno">
                    </div>

                    <label for="" class="col-sm-4 col-form-label "></label>

                    <label for="email" class="col-sm-1 col-form-label ">Email</label>
                    <div class="col-sm-3">
                        <input type="text" id="email" name="email" class="form-control"  placeholder="e-mail do aluno" >
                    </div>

                </div>
                <br></bR>
                <div class="form-group row "> 
                    <label for="nome_mae" class="col-sm-2 col-form-label ">Mãe</label>
                    <div class="col-sm-3">
                        <input type="text" id="nome_mae" name="nome_mae" class="form-control" placeholder="Nome da Mãe" >
                    </div>

                    <label for="nome_pai" class="col-sm-1 col-form-label ">Pai</label>
                    <div class="col-sm-3">
                        <input type="text" id="nome_pai" name="nome_pai" class="form-control" placeholder="Nome do Pai" >
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="nome_responsavel" class="col-sm-2 col-form-label ">Outro responsável</label>
                    <div class="col-sm-3">
                        <input type="text" id="nome_responsavel" name="nome_responsavel" class="form-control"  placeholder="Nome do responsável">
                    </div>


                    <label for="parentesco_responsavel" class="col-sm-1 col-form-label ">Parentesco</label>
                    <div class="col-sm-2">
                        <input type="text" id="parentesco_responsavel" name="parentesco_responsavel" class="form-control" placeholder="Parentesco do responsável">
                    </div>

                    <label for="telefone_responsavel" class="col-sm-1 col-form-label ">Telefone</label>
                    <div class="col-sm-2">
                        <input type="text" id="telefone_responsavel" name="telefone_responsavel" class="form-control" placeholder="Fone do responsável" >
                    </div>
                </div>
                <br></bR>

                <div class="form-group row "> 
                    <label for="profissao" class="col-sm-2 col-form-label ">Profissão</label>
                    <div class="col-sm-3">
                        <input type="text" id="profissao" name="profissao" class="form-control" placeholder="Profissão do aluno" >
                    </div>  
                </div>

                <div class="form-group row "> 
                    <label for="escolaridade" class="col-sm-2 col-form-label ">Escolaridade</label>

                    <div class="col-sm-3">
                        <select id="escolaridades" name="escolaridade" class="form-control">
                            @foreach ([  'Fund. I completo',  'Fund. I incompleto',  'Fund. II completo',
                                        'Fund. II incompleto','Médio completo',
                                        'Médio incompleto','Superior completo','Superior incompleto'] 
                                    as $escolaridade)
                                <option value="{{ $escolaridade }}">{{ $escolaridade }}</option>
                            @endforeach
                        </select>
                    </div>

                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label for="ano_escolar" class="col-sm-1 col-form-label ">Ano</label>
                    <div class="col-sm-1">
                        <input type="text" id="ano_escolar" name="ano_escolar" class="form-control" placeholder="Ano de escolaridade" >
                    </div> 

                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label for="turno" class="col-sm-1 col-form-label ">Turno</label>
                    <div class="col-sm-1">
                        <input type="text" id="turno" name="turno" class="form-control" placeholder="Turno da escolaridade" >
                    </div> 
                </div>
                <br></bR>
                <div class="form-group row "> 
                    <label for="clinica" class="col-sm-2 col-form-label ">Clínica</label>
                    <div class="col-sm-3">
                        <input type="text" id="clinica" name="clinica" class="form-control" placeholder="Clínica da família" >
                    </div> 
                </div>

                <div class="form-group row "> 
                    <label for="beneficio" class="col-sm-2 col-form-label">Benefício Gov.</label>

                    <div class="col-sm-3 d-flex align-items-center">
                        <div class="form-check">
                            <input type="checkbox" id="enableBeneficio" class="form-check-input" 
                            onclick="toggleInputBeneficio()" style="transform: translateY(1px);">
                        </div>
                        <input type="text" id="beneficio" name="beneficio" class="form-control ml-2" 
                            placeholder="Benefício do governo" disabled>
                    </div>

                    <label for="" class="col-sm-1 col-form-label "></label>
                    
                    <label for="necessidade" class="col-sm-2 col-form-label ">Necessidade</label>

                    <div class="col-sm-3 d-flex align-items-center">
                        <div class="form-check">
                            <input type="checkbox" id="enableNecessidade" class="form-check-input" 
                            onclick="toggleInputNecessidade()">
                        </div>

                        <input type="text" id="necessidade" name="necessidade" class="form-control" 
                            placeholder="Necessidade específica" disabled>
                    </div>
                </div> 
                <br></bR>
                <div class="form-group row "> 
                    <label for="uniforme_body" class="col-sm-2 col-form-label ">Body</label>
                    <div class="col-sm-1">
                        <input type="text" id="uniforme_body" name="uniformes[]" class="form-control" placeholder="Uniforme body" >
                    </div> 

                    <label for="uniforme_saia" class="col-sm-1 col-form-label ">Saia</label>
                    <div class="col-sm-1">
                        <input type="text" id="uniforme_saia" name="uniformes[]" class="form-control" placeholder="Uniforme saia" >
                    </div> 

                    <label for="uniforme_camisa" class="col-sm-1 col-form-label ">Camisa</label>
                    <div class="col-sm-1">
                        <input type="text" id="uniforme_camisa" name="uniformes[]" class="form-control" placeholder="Camisa camisa" >
                    </div> 

                    <label for="uniforme_calcado" class="col-sm-1 col-form-label ">Calçado</label>
                    <div class="col-sm-1">
                        <input type="text" id="uniforme_calcado" name="uniformes[]" class="form-control" placeholder="Nr calçado" >
                    </div> 
                </div>

                <input type="submit" class="btn btn-primary" value="Salvar">
            </div> <!-- Fim do container com a margem --> 
        </form> 

@endsection

