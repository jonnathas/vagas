@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">

    @if(isset($phone))

        {!! Form::model($phone,['url' => url('phone/'.$phone->id ) , 'method' => 'put'])!!}
    @else

        {!! Form::open(['url' => url('phone') , 'method' => 'post']) !!}
    @endif

    {!! Form::token() !!}

    <div class="form-group">
        {!! Form::label('number','Telefone') !!}
        {!! Form::text('number',null,['class'=> 'form-control']) !!}
    </div>

    @if(isset($phone))
        
        {!! Form::submit('Salvar',['class' => 'btn btn-primary form-control col-md-6']) !!}
        {!! Form::close() !!}

        
        {!! Form::open(['method' => 'delete','url' => url('phone/'.$phone->id)]) !!}
        {!! Form::submit('Deletar',['class' => 'btn btn-danger form-control col-md-6']) !!}
        {!! Form::close() !!}

    @else
        {!! Form::submit('Salvar',['class' => 'btn btn-primary form-control']) !!}
    @endif
    
    

</div>    
@endsection