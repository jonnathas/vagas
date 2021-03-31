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
        <table>
            <tr>
                <th>Nome</th><th>E-mail</th><th></th>
            </tr>
            @foreach ($candidates as $candidate)
                <tr>
                    <td>$candidate->name</td>
                    <td>$candidate->email</td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>
</div> 
@endsection