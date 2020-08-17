@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Notas</div>
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li> {{$error}} </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session('mensaje'))
                    <div class="alert alert-success">
                        <p>{{session('mensaje')}}</p>
                    </div>
                @endif
                <div class="card-body">
                    <form method="POST" action="{{ route('register.notas') }}">
                        @csrf
                        <label for="dni_docente">DNI DEL DOCENTE: </label> 
                      <input
                        type="number"
                        name="dni_docente"
                        placeholder="DNI del docente"
                        class="form-control"
                        minlength="8"
                        maxlength="8"
                        value="{{ old('dni_docente') }}"
                        required
                      />
                      <input
                        type="number"
                        name="dni_alumno"
                        placeholder="DNI del alumno"
                        class="form-control mb-2"
                        minlength="8"
                        maxlength="8"
                        value="{{old('dni_alumno')}}"
                        required
                      />
                      <input
                        type="number"
                        name="id_curso"
                        placeholder="Codigo del Curso"
                        class="form-control mb-2"
                        value="{{old('id_curso')}}"
                        required
                      />
                      <input
                        type="date"
                        name="date"
                        placeholder="fecha "
                        class="form-control mb-2"
                        min="1900-01-01"
                        max="2100-12-31"
                        value="{{old('date')}}"
                        required
                      />
                      
                      <input
                        type="number"
                        name="nota"
                        placeholder="Nota"
                        class="form-control mb-2"
                        value="{{old('nota')}}"
                        required
                      />
                      
                      <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
