<!DOCTYPE html>
<html>
    <head>
        <title>Ficha do Candidato</title>
    </head>

    <body>
            <p class="event-city"> Nome:
                <ion-icon name="location-outline"> </ion-icon>{{$nome}}
            </p>
            
            <p class="events-participants"> Telefone:
                <ion-icon name="people-outline"></ion-icon>{{$telefone}} 
            </p> 
            
            <p class="event-owner"> e-mail:
                <ion-icon name="star-outline"></ion-icon>{{$email}} 
            </p> 

            <p class="event-owner"> Data de Nascimento
                <ion-icon name="star-outline"></ion-icon>{{$data_nascimento}} 
            </p> 

            <p class="event-owner"> Responsável:
                <ion-icon name="star-outline"></ion-icon>{{$nome_responsavel}} 
            </p> 

            <p class="event-owner"> Parentesco:
                <ion-icon name="star-outline"></ion-icon>{{$parentesco_responsavel}} 
            </p> 

            <p>Atividades: </p>
            <ul id="item-list">
                @if($atividades)
                    @foreach($atividades as $atividade)
                        <li><ion-icon name="play-outline"></ion-icon> {{$atividade}} </li>
                    @endforeach
                @else
                    <li>Sem atividades</li>
                @endif
            </ul>

    </body>
</html>
