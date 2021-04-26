@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container mt-5">
    <div>
        <div>
            <h2>{{$user->name}}</h2>
            <p class="ml-4"><strong>Data de nascimento: </strong>{{$user->birth_date}}</p>
            
                    

            </div>
            <p class="ml-4"><strong>E-mail: </strong>{{$user->email}}</p>
            <div class="ml-4"><strong>Telefone: </strong>
                @foreach ($phones as $phone)
                    
                    <span class="mr-3">{{$phone->number}}</span>

                @endforeach
            </div>
        </div>
        <div class="mt-5">
            <h4>Endereço:</h4>
            
            @foreach ($adresses as $address)
                <div class="ml-4 mt-5">
                    <p><strong>Logradouro: </strong>{{$address->place}}</p> 
                    <p><strong>Complemento: </strong>{{$address->complement}}</p>
                    <p><strong>Número: </strong>{{$address->number}}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            <h4>Formação acadêmica:</h4>

            @foreach ($academic_experiences as $experience)
                <div class="mt-5 ml-4">
                    <h5><strong>Escola: </strong>{{$experience->school_name}}</h5>
                    <p><strong>Nome do curso: </strong>{{$experience->course_name}}</p>
                    <p><strong>Nível: </strong>{{$experience->course_level}}</p>
                    <p><strong>Pais: </strong>{{$experience->country}}</p>
                    <p><strong>Estatus: </strong>{{$experience->status}}</p>
                    <p><strong>Início: </strong>{{$experience->start}}</p>
                    <p><strong>Término: </strong>{{$experience->end}}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            <h4>Experiências profissionais:</h4>
        
            @foreach ($professional_experiences as $experience)
                <div class="mt-5 ml-4">
                    <h5><strong>Empresa: </strong>{{$experience->company}}</h5>
                    <p><strong>Cargo: </strong>{{$experience->role}}</p>
                    <p><strong>Descrição: </strong>{{$experience->description}}</p>
                    <p><strong>Início: </strong>{{$experience->start}}</p>
                    <p><strong>Desligamento: </strong>{{$experience->end}}</p>
                </div>
            @endforeach
            
        </div>
    </div>
</div>    
@endsection