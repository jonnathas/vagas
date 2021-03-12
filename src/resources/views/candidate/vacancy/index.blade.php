@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">

    @foreach ($vacancies as $vacancy)
        <div class="jumbotron">
            <h4>{{$vacancy->role}}</h4>
            <p>{{$vacancy->description}}</p>
            
            <span>Salário:</span>
            <p>{{$vacancy->wage}}</p>

            <span>Jornada:</span>
            <p>{{$vacancy->journey}}</p>
            
            <span>Contrato:</span>
            <p>{{$vacancy->contract}}</p>
        </div>
        

    @endforeach
</div>    
@endsection