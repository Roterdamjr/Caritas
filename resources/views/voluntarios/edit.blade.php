@extends('layouts.main')

@section('title', 'Editar Voluntário')

@section('content')

    <body class="antialiased">
        
        <form action="/voluntarios/update/{{$voluntario->id}}" method="POST" enctype="multipart/form-data" class="form-cadastro">
        @csrf 
        @method('PUT')

            <div class="container ml-5"> 

            <div class="form-group row"> 
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do voluntario" 
                        value="{{$voluntario->pessoa->nome}}">
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="rg" class="col-sm-2 col-form-label">RG</label>
                    <div class="col-sm-2">
                        <input type="text" id="rg" name="rg" class="form-control" placeholder="RG do voluntario" 
                        value="{{$voluntario->pessoa->nome}}">
                    </div>

                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label for="orgao_emissor" class="col-sm-2 col-form-label">Órgão Emissor</label>
                    <div class="col-sm-2">
                        <input type="text" id="orgao_emissor" name="orgao_emissor" class="form-control" placeholder="Emissor do RG"
                        value="{{$voluntario->pessoa->orgao_emissor}}" >
                    </div>

                    <label for="cpf" class="col-sm-1 col-form-label">CPF</label>
                    <div class="col-sm-2">
                        <input type="text" id="cpf" name="cpf" class="form-control" placeholder="CPF do voluntario" 
                        value="{{$voluntario->pessoa->cpf}}">
                    </div>
                </div>

                <div class="form-group row "> 

                    <label for="data_nascimento" class="col-sm-2 col-form-label text-nowrap">Data de Nascimento</label>
                    <div class="col-sm-2">
                        <input type="text" id="data_nascimento" name="data_nascimento" class="form-control"
                        value="{{$voluntario->pessoa->data_nascimento}}">

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
                    
                    <label for="" class="col-sm-1 col-form-label "></label>
                    
                    <label for="nacionalidade" class="col-sm-2 col-form-label">Nacionalidade</label>
                    <div class="col-sm-2">
                        <input type="text" id="nacionalidade" name="nacionalidade" class="form-control" placeholder="Nacionalidade do voluntario" 
                        value="{{$voluntario->pessoa->nacionalidade}}">
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="estado_civil" class="col-sm-2 col-form-label ">Estado Civil</label>
                    <div class="col-sm-2">
                        <input type="text" id="estado_civil" name="estado_civil" class="form-control" placeholder="Estado Civil " 
                        value="{{$voluntario->pessoa->estado_civil}}">
                    </div>

                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label for="profissao" class="col-sm-2 col-form-label text-nowrap">Profissão</label>
                    <div class="col-sm-2">
                        <input type="text" id="profissao" name="profissao" class="form-control" placeholder="Profissão do voluntario" 
                        value="{{$voluntario->profissao}}">
                    </div>
                </div>
                
                <div class="form-group row "> 
                    <label for="endereco" class="col-sm-2 col-form-label text-nowrap">Endereço</label>
                    <div class="col-sm-5">
                        <input type="text" id="endereco" name="endereco" class="form-control" placeholder="Logradouro, Cidade, Estado, CEP"
                        value="{{$voluntario->nome}}" >
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="telefone" class="col-sm-2 col-form-label ">Telefone</label>
                    <div class="col-sm-2">
                        <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Telefone do voluntario" 
                        value="{{$voluntario->pessoa->contato->telefone}}">
                    </div>

                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label for="email" class="col-sm-2 col-form-label text-nowrap">E-mail</label>
                    <div class="col-sm-3">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email do voluntario" 
                        value="{{$voluntario->pessoa->contato->email}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="carga_horaria" class="col-sm-2 col-form-label text-nowrap">Carga horaria</label>
                    <div class="col-sm-2">
                        <input type="text" id="carga_horaria" name="carga_horaria" class="form-control" placeholder="Carga horaria" 
                        value="{{$voluntario->carga_horaria}}">
                    </div>      

                    <label for="" class="col-sm-1 col-form-label "></label>

                    <label for="data_inicio" class="col-sm-2 col-form-label text-nowrap">Data de Início</label>
                    <div class="col-sm-2">
                        <input type="text" id="data_inicio" name="data_inicio" class="form-control"
                        value="{{$voluntario->data_inicio}}">

                        @if($errors->has('data_inicio'))
                            <span class="text-danger">
                                {{ $errors->first('data_inicio') }}
                            </span>
                        @endif
                        
                        <script>
                            $(document).ready(function(){
                                $("#data_inicio").inputmask("99/99/9999");  // Máscara no formato DD/MM/YYYY
                            });
                        </script>
                    </div>
                </div>

                <input type="submit" class="btn btn-primary" value="Editar">
            </div> <!-- Fim do container com a margem -->   
        </form> 

@endsection

