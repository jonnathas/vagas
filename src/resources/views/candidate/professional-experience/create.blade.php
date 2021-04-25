@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">
    
    @if(empty($experience))

        {!!Form::open([ 'url' => url('professional-experience'), 'method' => 'post' ])!!}
    @else
        {!!Form::model($experience,['url' => url('professional-experience/'.$experience->id), 'method' => 'put'])!!}
    @endif

    <div class="form-group">
        {!! Form::label('company','Empresa') !!}
        {!! Form::text('company',null,['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('role','Cargo') !!}
        {!! Form::text('role',null,['class' => 'form-control']) !!}
    </div>
    
    <div class="form-group">
        {!! Form::label('description','Descrição do cargo') !!}
        {!! Form::text('description',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('start','País') !!}
        {!! Form::date('start',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('end','País') !!}
        {!! Form::date('end',null,['class' => 'form-control']) !!}
    </div>


    @if(!isset($experience))
        <div class="form-group">
            {!! Form::submit('Salvar', [ 'class' => 'btn btn-primary col-12' ]) !!}
        </div>

        {!! Form::close() !!}

    @else
        <div class="form-group row">
            {!! Form::submit('Salvar', [ 'class' => 'btn btn-primary col-6' ]) !!}
            {!! Form::close() !!}
        

            {!! Form::open([ 'method' => 'delete', 'url' => url('professional-experience/'.$experience->id) ,'class'=> 'col-6'])!!}
            {!! Form::submit('Deletar',[ 'class' => 'btn btn-danger col-12']) !!}
            {!! Form::close() !!}
        </div>
        @endif
</div>    
@endsection