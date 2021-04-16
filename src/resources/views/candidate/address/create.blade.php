@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">
    
    @if(empty($address))

        {!!Form::open([ 'url' => url('address'), 'method' => 'post' ])!!}
    @else
        {!!Form::model($address,['url' => url('address/'.$address->id), 'method' => 'put'])!!}
    @endif

    <div class="form-group">
        {!! Form::label('place','Logradouro') !!}
        {!! Form::text('place',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('complement','Complemento') !!}
        {!! Form::text('complement',null,['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('number','Número') !!}
        {!! Form::text('number',null,['class' => 'form-control']) !!}
    </div>

    <div class="form-group">
        <label for="estado">Estado</label>
        <select name="state_id" id="estado" class="form-control">
            <option> Selecione um estado</option>

            @foreach ($states as $state)

                @if(isset($address))
                    @if($state->id == $address->state_id)
                        <option value="{{$state->id}}" selected>{{$state->name}}</option>
                    @endif
                @else
                    <option value="{{$state->id}}">{{$state->name}}</option>
                @endif
            @endforeach        

        </select>
    </div>

    <div class="form-group">
        {!! Form::submit('Salvar', [ 'class' => 'btn btn-primary col-12' ]) !!}
    </div>

</div>    
@endsection