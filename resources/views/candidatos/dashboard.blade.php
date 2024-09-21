@extends('layouts.main')

@section('title', 'Candidatos')

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
            @foreach($candidatos as $candidato)
                <tr>
                    <td scope="row" class="col-id">{{$candidato->id}}</td>
                    <td scope="row">{{$candidato->pessoa->nome}}</td>
                    <td scope="row">{{$candidato->pessoa->contato->email}}</td>
                    
                    <td class="actions">
                        <a href="/candidatos/{{$candidato->id}}">
                            <i class="fas fa-eye check-icon"></i>
                        </a>

                        <a href="/candidatos/edit/{{$candidato->id}} ">
                            <i class="far fa-edit edit-icon"></i>
                        </a>

                        <form class="delete-form" action="/candidatos/{{$candidato->id}}" method="POST">
                        @csrf 
                        @method('DELETE')
                            <input type="hidden" name="type" value="delete">
                            <input type="hidden" name="id" value="{{$candidato->id}}">
                            <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                        </form>
                    </td>
                
                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
