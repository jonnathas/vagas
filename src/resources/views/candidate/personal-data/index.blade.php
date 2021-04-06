@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container">
    <div>
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
                <div>
                    <p>{{$address->place}}</p>
                    <p>{{$address->complement}}</p>
                    <p>{{$address->number}}</p>
                </div>
            @endforeach
        </div>
        <div>
            <h4>Formação acadêmica:</h4>
            @foreach ($academic_experiences as $experience)
                <div>
                    <h5>{{$experience->school_name}}</h5>
                    <p>{{$experience->school_level}}</p>
                    <p>{{$experience->country}}</p>
                    <p>{{$experience->status}}</p>
                    <p>{{$experience->start}}</p>
                    <p>{{$experience->end}}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>    
@endsection