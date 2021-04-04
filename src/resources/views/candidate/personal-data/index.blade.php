@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">
    <div class="jumbotron">
        <h2>{{$user->name}}</h2>
        <p>{{$user->email}}</p>
    </div>
</div>    
@endsection