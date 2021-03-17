@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">

    <div> 
        <form action="{{url('vacancy')}}" method="get" class="form-row ">

            <input class="form-control col-md-4 mr-2" type="text" name="role" placeholder="Cargo" value="{{$search['role'] ?? ''}}"/>

            <select name="FK_state" class="form-control col-md-4 mr-2">
                <option value="0">Selecione um estado</option>
                @foreach ($states as $state)
                    <option value="{{$state->id}}">{{$state->abbreviation}}</option>
                @endforeach

            </select>

            <input class="form-control ptn btn-success col-md-4 mr-2" type="submit"  value="Buscar vaga"/>
        
        </form>
    </div>
    <div>
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
    <div> 
        {{$vacancies->appends($search)->links()}}
    </div>
</div>    
@endsection