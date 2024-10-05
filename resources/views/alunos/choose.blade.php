@extends('layouts.main')

@section('title', 'Escolher Candidatos')

@section('content')

@if(session('msg'))
    <div class="alert alert-success mt-3">  {{ session('msg') }}  </div>
@endif

<table class="table" id="contacts-table">
    <thead>
        <tr>
        <th scope="col">Nome</th>
        </tr>
    </thead>

    <tbody>
        
        @foreach($candidatos as $candidato)
            <tr>
                <td scope="row" class="col-id">
                    {{$candidato->id}}
                </td>
                  
                <td scope="row">
                    <a href="/alunos/create/{{$candidato->id}}">
                        {{$candidato->pessoa->nome}}
                    </a>
                </td>   
            </tr>
        @endforeach

    </tbody>
</table>




@endsection
