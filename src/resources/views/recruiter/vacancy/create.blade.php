@extends('vagas::layout.app')

@section('title','Ver vagas')

@section('content')
    <section class="container">
        <div>
            <form method="post" action="{{ url('recruiter/vacancy')}}">
                
                @csrf

                <div class="form-group">
                    <label for="cargo">Cargo</label>
                    <input class="form-control col-md" type="text" name="role" id="cargo" />
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control col-md" name="description" id="descricao"></textarea>
                </div>
                <div class="form-group">
                    <label for="salario">Salário</label>
                    <input class="form-control col-md" type="number" name="wage" id="salario" />
                </div>
                <div class="form-group">
                    <label for="jornada">Jornada</label>
                    <input class="form-control col-md" type="text" name="journey" id="jornada" />
                </div>
                <div class="form-group">
                    <label for="contrato">Contrato</label>
                    <input class="form-control col-md" type="text" name="contract" id="contrato" />
                </div>
                <div class="form-group">
                    <input class="form-control col-md btn btn-primary" type="submit" value="Publicar"/>
                </div>
            </form>
        </div>
    </section>
@endsection