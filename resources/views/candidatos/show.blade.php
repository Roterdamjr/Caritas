@extends('layouts.main')

@section('title', 'Candidato')

@section('content')

<form action="/candidatos/imprimir/{{$candidato->id}}" method="GET" enctype="multipart/form-data" class="form-cadastro">

<!--  
    <form action="/baixar-pdf" method="GET" enctype="multipart/form-data" class="form-cadastro">
-->

        <p class="event-city"> Nome:
                <ion-icon name="location-outline"> </ion-icon>{{$candidato->pessoa->nome}}
        </p>
        
        <p class="events-participants"> Telefone:
            <ion-icon name="people-outline"></ion-icon>{{$candidato->pessoa->contato->telefone}} 
        </p> 
        
        <p class="event-owner"> e-mail:
            <ion-icon name="star-outline"></ion-icon>{{$candidato->pessoa->contato->email}} 
        </p> 

        <p class="event-owner"> Data de Nascimento
            <ion-icon name="star-outline"></ion-icon>{{$dataNascimento}} 
        </p> 

        <p class="event-owner"> Responsável:
            <ion-icon name="star-outline"></ion-icon>{{$candidato->pessoa->nome_responsavel}} 
        </p> 

        <p class="event-owner"> Parentesco:
            <ion-icon name="star-outline"></ion-icon>{{$candidato->pessoa->parentesco_responsavel}} 
        </p> 

        <p>Atividades: </p>
        <ul id="item-list">
            @if($candidato->atividades)
                @foreach($candidato->atividades as $atividade)
                    <li><ion-icon name="play-outline"></ion-icon> {{$atividade}} </li>
                @endforeach
            @else
                <li>Sem atividades</li>
            @endif
        </ul>
  
    <input type="submit" class="btn btn-primary" value="Gerar PDF">

</form>
@endsection