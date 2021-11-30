@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">
    
    @if(empty($company))

        {!!Form::open([ 'url' => url('recruiter/company'), 'method' => 'post' ])!!}
    @else
        {!!Form::model($company,['url' => url('recruiter/company/'.$company->id), 'method' => 'put'])!!}
    @endif

    <div class="form-group">
        {!! Form::label('name','Nome da empresa') !!}
        {!! Form::text('name',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('cnpj','CNPJ da empresa') !!}
        {!! Form::text('cnpj',null,['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::submit('Salvar', [ 'class' => 'btn btn-primary col-12' ]) !!}
    </div>
    
    {!! Form::close() !!}

</div>    
@endsection