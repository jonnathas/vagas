@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">

    <div>
            <div class="jumbotron">
                <h4>{{$vacancy->role}}</h4>
                <p>{{$vacancy->description}}</p>
                
                <span>Salário:</span>
                <p>{{$vacancy->wage}}</p>

                <span>Jornada:</span>
                <p>{{$vacancy->journey}}</p>
                
                <span>Contrato:</span>
                <p>{{$vacancy->contract}}</p>
                
                @auth
                    @if(!$is_candidate)
                        <div>
                            <form action="vacancy/{{$vacancy->id}}/candidancy" method="post">
                                @csrf
                                <input type="submit" value="Candidatar-se"  class="form-control ptn btn-warning col-md-4 mr-2" />
                            </form>
                        </div>    
                    @else
                        <input type="submit" value="Você já é candidato."  class="form-control ptn btn-outline-warning col-md-4 mr-2" disabled/>                
                        <p><p>
                    @endif
                @endauth

            </div>
    </div> 
</div>    
@endsection