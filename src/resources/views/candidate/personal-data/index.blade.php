@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')

<div class="container mt-5">
    <div>
        <div>
            <h2>{{$user->name}}</h2>
            <div >
                <form action="#">
                    <input type="submit" value="Editar nome"  class="form-control ptn btn-warning col-md-4 mb-5" >
                </form>
            </div>
            <p class="ml-4"><strong>E-mail: </strong>{{$user->email}}</p>
            <p class="ml-4"><strong>Telefone: </strong>
                @foreach ($phones as $phone)
                {{$phone->number}}    
                @endforeach
            </p>
            <div >
                <form action="#">
                    <input type="submit" value="Editar telefones"  class="form-control ptn btn-warning col-md-4 mb-5" >
                </form>
            </div>
        </div>
        <div class="mt-5">
            <h4>Endereço:</h4>
            <div >
                <form action="#">
                    <input type="submit" value="Editar"  class="form-control ptn btn-warning col-md-4 mb-5" >
                </form>
            </div>
            @foreach ($adresses as $address)
                <div class="ml-4">
                    <p><strong>Logradouro: </strong>{{$address->place}}</p>
                    <p><strong>Complemento: </strong>{{$address->complement}}</p>
                    <p><strong>Número: </strong>{{$address->number}}</p>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            <h4>Formação acadêmica:</h4>
            <div >
                <form action="#">
                    <input type="submit" value="Adicionar fomação"  class="form-control ptn btn-primary col-md-4 mb-5" >
                </form>
            </div>

            @foreach ($academic_experiences as $experience)
                <div class="mt-5 ml-4">
                    <h5><strong>Escola: </strong>{{$experience->school_name}}</h5>
                    <p><strong>Nome do curso: </strong>{{$experience->course_name}}</p>
                    <p><strong>Nível: </strong>{{$experience->course_level}}</p>
                    <p><strong>Pais: </strong>{{$experience->country}}</p>
                    <p><strong>Estatus: </strong>{{$experience->status}}</p>
                    <p><strong>Início: </strong>{{$experience->start}}</p>
                    <p><strong>Término: </strong>{{$experience->end}}</p>
                    <div >
                        <form action="#">
                            <input type="submit" value="Editar"  class="form-control ptn btn-primary col-md-4 mb-5" >
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-5">
            <h4>Experiências profissionais:</h4>
            <div >
                <form action="#">
                    <input type="submit" value="Adicionar experiencias"  class="form-control ptn btn-primary col-md-4 mb-5" >
                </form>
            </div>
            @foreach ($professional_experiences as $experience)
                <div class="mt-5 ml-4">
                    <h5><strong>Empresa: </strong>{{$experience->company}}</h5>
                    <p><strong>Cargo: </strong>{{$experience->role}}</p>
                    <p><strong>Descrição: </strong>{{$experience->description}}</p>
                    <p><strong>Início: </strong>{{$experience->start}}</p>
                    <p><strong>Desligamento: </strong>{{$experience->end}}</p>
                    <form action="#">
                        <input type="submit" value="Editar"  class="form-control ptn btn-warning col-md-4 mb-5" >
                    </form>
                </div>
            @endforeach
            
        </div>
    </div>
</div>    
@endsection