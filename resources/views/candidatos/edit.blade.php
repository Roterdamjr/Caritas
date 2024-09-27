@extends('layouts.main')

@section('title', 'Editar Candidato')

@section('content')

    <body class="antialiased">
        
        <form action="/candidatos/update/{{$candidato->id}}" method="POST" enctype="multipart/form-data">
        @csrf 
        @method('PUT')

            <div class="container ml-5"> 

                <div class="form-group row"> 
                    <label for="nome" class="col-sm-2 col-form-label">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Nome do candidato" 
                            value="{{$candidato->pessoa->nome}}">
                    </div>
                </div>

                <div class="form-group row "> 
                    <label for="fone" class="col-sm-2 col-form-label ">Telefone</label>
                    <div class="col-sm-2">
                        <input type="text" id="fone" name="fone" class="form-control" placeholder="Telefone do candidato" 
                            value="{{$candidato->pessoa->contato->telefone}}">
                    </div>

                    <label for="email" class="col-sm-1 col-form-label text-nowrap">E-mail</label>
                    <div class="col-sm-3">
                        <input type="text" id="email" name="email" class="form-control" placeholder="Email do candidato" 
                            value="{{$candidato->pessoa->contato->email}}">
                    </div>

                    <label for="data_nascimento" class="col-sm-2 col-form-label text-nowrap">Data de Nascimento</label>
                    <div class="col-sm-2">
                        <input type="text" id="data_nascimento" name="data_nascimento" class="form-control" placeholder="Data de Nascimento" 
                            value="{{$data_nascimento}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nome_responsavel" class="col-sm-2 col-form-label">Responsável</label>
                    <div class="col-sm-10">
                        <input type="text" id="nome_responsavel" name="nome_responsavel" class="form-control" placeholder="Nome do responsável" 
                            value="{{$candidato->pessoa->nome_responsavel}}">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="parentesco_responsavel" class="col-sm-2 col-form-label">Parentesco</label>
                    <div class="col-sm-5">
                        <input type="text" id="parentesco_responsavel" name="parentesco_responsavel" class="form-control" placeholder="Parentesco do responsável" 
                            value="{{$candidato->pessoa->parentesco_responsavel}}">
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

                <input type="submit" class="btn btn-primary" value="Editar candidato">
            </div> <!-- Fim do container com a margem -->   
        </form> 

@endsection

