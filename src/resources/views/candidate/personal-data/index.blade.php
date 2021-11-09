@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container mt-5">
    <div>
        <div>
            <h2>{{$user->name}} 
                <a href="{{url('personal-data/'.$user->id.'/edit')}}"><i class="far fa-edit"></i></a>
            </h2>
            <p class="ml-4"><strong>Data de nascimento: </strong>{{$user->birth_date}}</p>
            
                    

            </div>
            <p class="ml-4"><strong>E-mail: </strong>{{$user->email}}</p>
            <div class="ml-4"><strong>Telefone: </strong>
                @foreach ($phones as $phone)
                    
                    <span class="mr-3">{{$phone->number}}
                    <a href="{{url('phone/'.$phone->id.'/edit')}}"><i class="far fa-edit"></i></a>
                    </span>

                @endforeach
                
                <a href="{{url('phone/create')}}">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="mt-5">
            <h4>Endereço:
                <a href="{{url('address/create')}}">
                    <i class="fas fa-plus"></i>
                </a>
            </h4>
            
            @foreach ($adresses as $address)
                <div class="ml-4 mt-5 jumbotron">
                    @if(!$address->on_curriculum)
                        <label><a href="{!! route('address.active',['id' => $address->id]) !!}">Ativar</a></label>
                    @else
                        <label>Ativo</label>
                    @endif
                    <p><strong>Logradouro: </strong>{{$address->place}}
                        <a href="{!! url('address/'.$address->id.'/edit') !!}"><i class="far fa-edit"></i></a>
                    </p>
                    <p><strong>Complemento: </strong>{{$address->complement}}</p>
                    <p><strong>Número: </strong>{{$address->number}}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            <h4>Formação acadêmica:
                <a href="{{url('academic-experience/create')}}">
                    <i class="fas fa-plus"></i>
                </a>
            </h4>

            @foreach ($academic_experiences as $experience)
                <div class="mt-5 ml-4">
                    <h5>
                        <strong>Escola: </strong>{{$experience->school_name}}
                        <a href="{!! url('academic-experience/'.$experience->id.'/edit') !!}"><i class="far fa-edit"></i></a>
                    </h5>
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
            <h4>Experiências profissionais: 
                <a href="{{url('professional-experience/create')}}">
                    <i class="fas fa-plus"></i>
                </a>
            </h4>
        
            @foreach ($professional_experiences as $experience)
                <div class="mt-5 ml-4">
                    <h5><strong>Empresa: </strong>
                        {{$experience->company}}
                        <a href="{!! url('professional-experience/'.$experience->id.'/edit') !!}"><i class="far fa-edit"></i></a>
                    </h5>
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