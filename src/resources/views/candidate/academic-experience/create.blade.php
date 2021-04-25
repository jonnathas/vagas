@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">
    
    @if(empty($experience))

        {!!Form::open([ 'url' => url('academic-experience'), 'method' => 'post' ])!!}
    @else
        {!!Form::model($experience,['url' => url('academic-experience/'.$experience->id), 'method' => 'put'])!!}
    @endif

    <div class="form-group">
        {!! Form::label('school_name','Nome da escola') !!}
        {!! Form::text('school_name',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('course_name','Nome do curso') !!}
        {!! Form::text('course_name',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('course_level','Nível do curso') !!}
        {!! Form::select('course_level',[
            'básico' => 'básico',
            'médio'=> 'médio',
            'técnico' => 'técnico',
            'universitário'=> 'universitário',
            'especialização'=> 'especialização',
            'mestrado' => 'mestrado',
            'doutorado' => 'doutorado',
            'livre_docência' => 'livre docência',
            'adjunto' => 'adjunto',
            'titular' => 'titular',
            'mba' => 'mba'
        ],null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('country','País') !!}
        {!! Form::text('country',null,['class' => 'form-control']) !!}
    </div>

    
    <div class="form-group">
        {!! Form::label('status','Nível do curso') !!}
        {!! Form::select('status',[
            'completo' => 'completo',
            'cursando'=>'cursando'
        ],null,['class' => 'form-control']) !!}
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
        

            {!! Form::open([ 'method' => 'delete', 'url' => url('academic-experience/'.$experience->id) ,'class'=> 'col-6'])!!}
            {!! Form::submit('Deletar',[ 'class' => 'btn btn-danger col-12']) !!}
            {!! Form::close() !!}
        </div>
        @endif
</div>    
@endsection