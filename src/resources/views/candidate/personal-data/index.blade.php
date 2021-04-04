@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">
    <form action="{{route('personal_data.store')}}" method="POST">
        
        <div class="form-group">
            <label for="contrato">Contrato</label>
            <input class="form-control col-md" type="text" name="contract" id="contrato" />
        </div>
    </form>
</div>    
@endsection