@extends('layouts.main')

@section('title', 'Cadastrar Candidato')

@section('content')

    <body class="antialiased">
        
        <form action="/candidatos" method="POST" enctype="multipart/form-data">
        @csrf 

            <div class="container ml-5"> 

                <div class="form-group row"> 
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do candidato" required>
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="fone" class="col-sm-2 col-form-label ">Telefone</label>
                    <div class="col-sm-2">
                        <input type="text" id="fone" name="fone" class="form-control" placeholder="Telefone do candidato" >
                    </div>

                    <label for="email" class="col-sm-1 col-form-label text-nowrap">E-mail</label>
                    <div class="col-sm-3">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email do candidato" >
                    </div>

                    <label for="data_nascimento" class="col-sm-2 col-form-label text-nowrap">Data de Nascimento</label>
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

                </div>

                <div class="form-group row">
                    <label for="nome_responsavel" class="col-sm-2 col-form-label">Responsável</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome_responsavel" name="nome_responsavel" class="form-control" placeholder="Nome do responsável" >
                    </div>
                </div>

                <div class="form-group row">
                    <label for="parentesco_responsavel" class="col-sm-2 col-form-label">Parentesco</label>
                    <div class="col-sm-5">
                        <input type="text" id="parentesco_responsavel" name="parentesco_responsavel" class="form-control" placeholder="Parentesco do responsável">
                    </div>
                </div>

                <div class="form-group">
                    <label for="title">Atividade</label>
                    
                    <div class="form-group row"> 
                        @foreach (['Arte que Ajuda', 'Ação de Caritas', 'Ballet', 'Biblioteca Com.', 'Canto Coral', 
                                'Flauta Doce', 'Gestação Acolhida', 'Reforço Escolar', 'Sapateado', 'Teatro', 'Violino', 'Violão'] 
                                as $atividade)
                                <div class="col-md-2"> 
                                    <div class="form-check">
                                        <input type="checkbox" name="atividades[]" value="{{ $atividade }}" class="form-check-input">
                                        <label class="form-check-label">{{ $atividade }}</label>
                                    </div>
                                </div>
                        @endforeach
                    </div>
     
                </div> 

                <input type="submit" class="btn btn-primary" value="Cadastrar candidato">
            </div> <!-- Fim do container com a margem --> 
        </form> 

@endsection

