@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">ASIGNAR CURSOS DOCENTES</div>
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
                    <form method="POST" action="{{ route('cursos.update') }}">
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
                      <label for="id_curso">ID DEL CURSO: </label> 
                      <input
                        type="number"
                        name="id_curso"
                        placeholder="Codigo del Curso"
                        class="form-control mb-2"
                        value="{{old('id_curso')}}"
                        required
                      />
                      <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    </form>
                </div>
                <div class="card-header">ASIGNAR CURSOS A ALUMNOS </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('lleva_cursos.update') }}">
                        @csrf
                      <label for="dni_docente">DNI DEL ALUMNO: </label> 
                      <input
                        type="tel"
                        name="dni"
                        placeholder="DNI del docente"
                        class="form-control"
                        minlength="8"
                        maxlength="8"
                        value="{{ old('dni_docente') }}"
                        required
                      />
                      <label for="id_curso">ID DEL CURSO: </label> 
                      <input
                        type="number"
                        name="id_curso2"
                        placeholder="Codigo del Curso"
                        class="form-control mb-2"
                        value="{{old('id_curso2')}}"
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
