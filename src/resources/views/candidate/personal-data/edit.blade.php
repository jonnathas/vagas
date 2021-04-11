@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">
    <form action="{{route('personal_data.update',$user->id)}}" method="POST">

        @csrf

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input class="form-control col-md" type="text" name="name" id="nome" value="{{$user->name}}"/>
        </div>
        <div class="form-group">
            <label for="data-de-nascimento">Data de nascimento:</label>
            <input class="form-control col-md" type="date" name="birth_date" id="data-de-nascimento" value="{{$user->birth_date}}"/>
        </div>
        <div class="form-group">
            <input class="form-control col-md btn btn-primary" type="submit" value="Atualizar"/>
        </div>
        

    </form>
</div>    
@endsection