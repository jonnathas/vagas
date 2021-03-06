@extends('vagas::layout.app')

@section('content')
<div class="container">
    <div> 
        <form action="{{url('recruiter/vacancy')}}" method="get" class="form-row ">

            <input class="form-control col-md-4 mr-2" type="text" name="role" placeholder="Cargo" value="{{$search['role'] ?? ''}}"/>

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
                
                <form action="vacancy/{{$vacancy->id}}" method="get">
                    <input type="submit" value="Acompanhar"  class="form-control ptn btn-warning col-md-4 mr-2">
                </form>

            </div>
        @endforeach
    </div> 
    <div> 
        {{$vacancies->appends($search)->links()}}
    </div>
</div> 
@endsection