@extends('layouts.main')

@section('title', 'Voluntários')

@section('content')

@if(session('msg'))
    <div class="alert alert-success mt-3">  {{ session('msg') }}  </div>
@endif

<table class="table" id="contacts-table">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        <th scope="col">email</th>
        <th scope="col"></th>
        </tr>
    </thead>
    

    <tbody>
        @foreach($voluntarios as $voluntario)
            <tr>
                <td scope="row" class="col-id">{{$voluntario->id}}</td>
                <td scope="row">{{$voluntario->pessoa->nome}}</td>
                <td scope="row">{{$voluntario->pessoa->contato->email}}</td>
                
                <td class="actions">
                    <a href="/voluntarios/{{$voluntario->id}}">
                        <i class="fas fa-eye check-icon"></i>
                    </a>

                    <a href="/voluntarios/edit/{{$voluntario->id}} ">
                        <i class="far fa-edit edit-icon"></i>
                    </a>

                    <form class="delete-form" action="/voluntarios/{{$voluntario->id}}" method="POST">
                    @csrf 
                    @method('DELETE')
                        <input type="hidden" name="type" value="delete">
                        <input type="hidden" name="id" value="{{$voluntario->id}}">
                        <button type="submit" class="delete-btn"><i class="fas fa-times delete-icon"></i></button>
                    </form>
                </td>
            
            </tr>
        @endforeach
    </tbody>
</table>




@endsection
