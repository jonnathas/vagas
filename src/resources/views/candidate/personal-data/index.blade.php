@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">
    <div class="jumbotron">
        <div>
            <h2>{{$user->name}}</h2>
            <p>{{$user->email}}</p>
            <p>
                @foreach ($phones as $phone)
                {{$phone->number}}    
                @endforeach
            </p>
        </div>
        <div>
            <h4>Endereço:</h4>
            @foreach ($adresses as $address)
                <p>{{$address->place}}</p>
                <p>{{$address->complement}}</p>
                <p>{{$address->number}}</p>
            @endforeach
        </div>
    </div>
</div>    
@endsection