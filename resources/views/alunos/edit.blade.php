@extends('layouts.main')

@section('title', 'Editar Aluno')

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
    
    <form action="/alunos/update/{{$aluno->id}}" method="POST" enctype="multipart/form-data" class="form-cadastro">
    @csrf 
    @method('PUT')
        <div class="container ml-1"> 

            <div class="form-group row"> 
                <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-4">
                    <input type="text" id="nome" name="nome" class="form-control"  value="{{$aluno->pessoa->nome}}">
                </div>

                <label for="" class="col-sm-2 col-form-label "></label>

                <label for="data_nascimento" class="col-sm-2 col-form-label ">Data de Nascimento</label>
                <div class="col-sm-2">
                    <input type="text" id="data_nascimento" name="data_nascimento" class="form-control"
                    value="{{$data_nascimento}}">
                    
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
                    <input type="text" id="nome_social" name="nome_social" class="form-control"  
                    value="{{$aluno->pessoa->nome_social}}">
                </div>
            </div>

            <br></bR>

            <div class="form-group row ">
                <label for="atividade" class="col-sm-2 col-form-label ">Atividade</label>

                <div class="col-sm-2">
                    <select id="atividades" name="atividade" class="form-control">
                        @foreach (['Arte que Ajuda', 'Ação de Caritas', 'Ballet', 'Biblioteca Com.', 'Canto Coral', 
                            'Flauta Doce', 'Gestação Acolhida', 'Reforço Escolar', 'Sapateado', 'Teatro', 'Violino', 'Violão'] 
                            as $atividade)
                            <option value="{{ $atividade }}"
                                @if ($atividade == old('atividade', $aluno->atividade)) selected @endif>
                                {{ $atividade }}
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <label for="" class="col-sm-1 col-form-label "></label>

                <label for="atividade_dia_semana" class="col-sm-1 col-form-label ">Dia</label>
                <div class="col-sm-2">
                    <select id="atividade_dia_semana" name="atividade_dia_semana" class="form-control">
                        @foreach (['Seg','Ter', 'Qua','Qui','Sex','Sab'] 
                            as $atividade_dia_semana)
                            <option value="{{ $atividade_dia_semana }}"
                            @if ($atividade_dia_semana == old('atividade_dia_semana', $aluno->atividade_dia_semana)) selected @endif>
                                {{ $atividade_dia_semana }}     
                            </option>
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
                            <option value="{{ $atividade_turno }}"
                                @if ($atividade_turno == old('atividade_turno', $aluno->atividade_turno)) selected @endif>
                                {{ $atividade_turno }}   
                            </option>
                        @endforeach
                    </select>
                </div>
                
                <label for="" class="col-sm-1 col-form-label "></label>

                <label class="col-sm-1 col-form-label ">Horário</label>
                <div class="col-sm-1">
                    <input type="text" id="atividade_horario_ini" name="atividade_horario_ini" class="form-control" 
                    value="{{$atividade_horario_ini}}">
                </div>

                <label for="atividade_horario_fim" class="col-sm-1 col-form-label text-center" style="display: flex; justify-content: center; align-items: center;">às</label>

                <div class="col-sm-1">
                    <input type="text" id="atividade_horario_fim" name="atividade_horario_fim" class="form-control" 
                    value="{{$atividade_horario_fim}}">
                </div>
            </div>

            <br></bR>
            <div class="form-group row "> 

                <label for="estado_civil" class="col-sm-2 col-form-label ">Estado Civil</label>
                <div class="col-sm-2">
                    <input type="text" id="estado_civil" name="estado_civil" class="form-control" 
                    value="{{$aluno->pessoa->estado_civil}}" >
                </div> 

                <label for="" class="col-sm-1 col-form-label "></label>

                <label for="cor" class="col-sm-1 col-form-label ">Cor</label>
                <div class="col-sm-2">
                    <input type="text" id="cor" name="cor" class="form-control" placeholder="Cor do aluno"
                    value="{{$aluno->pessoa->cor}}" >
                </div> 

                <label for="" class="col-sm-1 col-form-label "></label>

                <label for="sexo" class="col-sm-1 col-form-label ">Sexo</label>
                <div class="col-sm-2">
                    <select id="sexos" name="sexo" class="form-control">
                        @foreach ([  'Masculino',  'Feminino', 'Outro'] 
                                as $sexo)
                            <option value="{{ $sexo }}"     
                            @if ($sexo == old('sexo', $aluno->pessoa->sexo)) selected @endif>
                                {{ $sexo }} 
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br></bR>
            <div class="form-group row "> 
                <label for="endereco" class="col-sm-2 col-form-label ">Endereço</label>
                <div class="col-sm-5">
                    <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Endereço do aluno"
                    value="{{$aluno->pessoa->contato->endereco}}">
                </div>
                
                <label for="" class="col-sm-1 col-form-label "></label>

                <label for="comunidade" class="col-sm-2 col-form-label ">Comunidade</label>
                <div class="col-sm-2">
                    <select id="comunidades" name="comunidade" class="form-control">
                        @foreach ([ '', 'Céu Azul','Rato Molhado','Dois de Maio','São João','Matriz'] 
                                as $comunidade)
                            <option value="{{ $comunidade }}"                            
                                @if ($comunidade == old('comunidade', $aluno->comunidade)) selected @endif>
                                {{ $comunidade }}  
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row "> 
                <label for="telefone" class="col-sm-2 col-form-label ">Telefone</label>
                <div class="col-sm-2">
                    <input type="text" id="telefone" name="telefone" class="form-control"  
                        value="{{$aluno->pessoa->contato->telefone}}"">
                </div>

                <label for="" class="col-sm-4 col-form-label "></label>

                <label for="email" class="col-sm-1 col-form-label ">Email</label>
                <div class="col-sm-3">
                    <input type="text" id="email" name="email" class="form-control"  
                        value="{{$aluno->pessoa->contato->email}}" >
                </div>

            </div>
            <br></bR>
            <div class="form-group row "> 
                <label for="nome_mae" class="col-sm-2 col-form-label ">Mãe</label>
                <div class="col-sm-3">
                    <input type="text" id="nome_mae" name="nome_mae" class="form-control" 
                    value="{{$aluno->pessoa->nome_mae}}" >
                </div>

                <label for="nome_pai" class="col-sm-1 col-form-label ">Pai</label>
                <div class="col-sm-3">
                    <input type="text" id="nome_pai" name="nome_pai" class="form-control"
                    value="{{$aluno->pessoa->nome_pai}}" >
                </div>
            </div>

            <div class="form-group row "> 
                <label for="nome_responsavel" class="col-sm-2 col-form-label ">Outro responsável</label>
                <div class="col-sm-3">
                    <input type="text" id="nome_responsavel" name="nome_responsavel" class="form-control"  
                    value="{{$aluno->pessoa->nome_responsavel}}">
                </div>


                <label for="parentesco_responsavel" class="col-sm-1 col-form-label ">Parentesco</label>
                <div class="col-sm-2">
                    <input type="text" id="parentesco_responsavel" name="parentesco_responsavel" class="form-control" 
                    value="{{$aluno->pessoa->parentesco_responsavel}}">
                </div>

                <label for="telefone_responsavel" class="col-sm-1 col-form-label ">Telefone</label>
                <div class="col-sm-2">
                    <input type="text" id="telefone_responsavel" name="telefone_responsavel" class="form-control" 
                    value="{{$aluno->pessoa->telefone_responsavel}}" >
                </div>
            </div>
            <br></bR>

            <div class="form-group row "> 
                <label for="profissao" class="col-sm-2 col-form-label ">Profissão</label>
                <div class="col-sm-3">
                    <input type="text" id="profissao" name="profissao" class="form-control" 
                    value="{{$aluno->profissao}}">
                </div>  

                <label for="" class="col-sm-1 col-form-label "></label>

                <label for="instituicao" class="col-sm-2 col-form-label ">Instituição de ensino</label>
                <div class="col-sm-2">
                    <input type="text" id="instituicao" name="instituicao" class="form-control" 
                    value="{{$aluno->instituicao}}" >
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
                            <option value="{{ $escolaridade }}"
                                @if ($escolaridade == old('escolaridade', $aluno->escolaridade)) selected @endif>
                                {{ $escolaridade }}  
                            </option>
                        @endforeach
                    </select>
                </div>

                <label for="" class="col-sm-1 col-form-label "></label>

                <label for="" class="col-sm-2 col-form-label ">Ano/Período</label>
                <div class="col-sm-1">
                    <input type="text" id="ano_escolar" name="ano_escolar" class="form-control" 
                    value="{{$aluno->ano_escolar}}" >
                </div> 

                <label for="" class="col-sm-1 col-form-label "></label>

                <label for="turno" class="col-sm-1 col-form-label ">Turno</label>
                <div class="col-sm-1">
                    <input type="text" id="turno" name="turno" class="form-control" 
                    value="{{$aluno->turno}}" >
                </div> 
            </div>
            <br></bR>
            <div class="form-group row "> 
                <label for="clinica" class="col-sm-2 col-form-label ">Clínica</label>
                <div class="col-sm-3">
                    <input type="text" id="clinica" name="clinica" class="form-control" 
                    value="{{$aluno->clinica}}" >
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
                    value="{{$aluno->beneficio}}" >
                </div>

                <label for="" class="col-sm-1 col-form-label "></label>
                
                <label for="necessidade" class="col-sm-2 col-form-label ">Necessidade</label>

                <div class="col-sm-3 d-flex align-items-center">
                    <div class="form-check">
                        <input type="checkbox" id="enableNecessidade" class="form-check-input" onclick="toggleInputNecessidade()">
                    </div>

                    <input type="text" id="necessidade" name="necessidade" class="form-control" 
                    value="{{$aluno->necessidade}}" >
                </div>
            </div> 
            <br></bR>
            <div class="form-group row "> 
                <label for="uniforme_body" class="col-sm-2 col-form-label ">Body</label>
                <div class="col-sm-1">
                    <input type="text" id="uniforme_body" name="uniformes[]" class="form-control" 
                    value="{{$aluno->uniformes[0]}}" >
                </div> 

                <label for="uniforme_saia" class="col-sm-1 col-form-label ">Saia</label>
                <div class="col-sm-1">
                    <input type="text" id="uniforme_saia" name="uniformes[]" class="form-control" 
                    value="{{$aluno->uniformes[1]}}" >
                </div> 

                <label for="uniforme_camisa" class="col-sm-1 col-form-label ">Camisa</label>
                <div class="col-sm-1">
                    <input type="text" id="uniforme_camisa" name="uniformes[]" class="form-control" 
                    value="{{$aluno->uniformes[2]}}" >
                </div> 

                <label for="uniforme_calcado" class="col-sm-1 col-form-label ">Calçado</label>
                <div class="col-sm-1">
                    <input type="text" id="uniforme_calcado" name="uniformes[]" class="form-control" 
                    value="{{$aluno->uniformes[3]}}" >
                </div> 
            </div>

            <input type="submit" class="btn btn-primary" value="Salvar">
        </div> <!-- Fim do container com a margem --> 
    </form> 

@endsection

