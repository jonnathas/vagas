@extends('vagas::layout.app')

@section('content')
<div class="container">   
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
    <div>  
        <h4>Candidatos:</h4>
        <table class="table table-striped" >
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">E-mail</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($candidates as $candidate)
                    <tr>
                        <td>{{$candidate->name}}</td>
                        <td>{{$candidate->email}}</td>
                        <td><a href="{{url("recruiter/vacancy/$vacancy->id/candidate/$candidate->id")}}">visualizar</a></td>
                    </tr>        
                @endforeach
            </tbody>
        </table>
        <div>
            {{$candidates->links()}}
        </div>
    </div>
</div> 
@endsection