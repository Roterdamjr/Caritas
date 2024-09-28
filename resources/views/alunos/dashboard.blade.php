@extends('layouts.main')

@section('title', 'Alunos')

@section('content')

<table class="table" id="contacts-table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nome</th>
            <th scope="col">email</th>
            <th scope="col"></th>
          </tr>
        </thead>
		
        <tbody>
            @foreach($alunos as $aluno)
                <tr>
                    <td scope="row" class="col-id">{{$aluno->id}}</td>
                    <td scope="row">{{$aluno->pessoa->nome}}</td>
                    <td scope="row">{{$aluno->pessoa->contato->email}}</td>
                    
                    <td class="actions">
                        <a href="/alunos/{{$aluno->id}}">
                            <i class="fas fa-eye check-icon"></i>
                        </a>

                        <a href="/alunos/edit/{{$aluno->id}} ">
                            <i class="far fa-edit edit-icon"></i>
                        </a>

                        <form class="delete-form" action="/alunos/{{$aluno->id}}" method="POST">
                        @csrf 
                        @method('DELETE')
                            <input type="hidden" name="type" value="delete">
                            <input type="hidden" name="id" value="{{$aluno->id}}">
                            <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                        </form>
                    </td>
                
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
