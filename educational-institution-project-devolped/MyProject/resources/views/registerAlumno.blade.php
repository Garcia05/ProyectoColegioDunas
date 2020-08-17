@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Alumno </div>
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

                    <form method="POST" action="{{ route('alumnos.registro') }}">
                        @csrf
                      <input
                        type="text"
                        name="name"
                        placeholder="Nombre"
                        class="form-control mb-2"
                        value="{{ old('name') }}"
                      />
                      <input
                        type="text"
                        name="first_name"
                        placeholder="Primer Apellido"
                        class="form-control mb-2"
                        value="{{ old('first_name') }}"
                      />
                      <input
                        type="text"
                        name="last_name"
                        placeholder="Segundo Apellido"
                        class="form-control mb-2"
                        value="{{ old('last_name') }}"
                      />
                      <input
                        type="tel"
                        name="dni"
                        placeholder="DNI"
                        class="form-control mb-2"
                        minlength="8"
                        maxlength="8"
                        required
                        value="{{ old('dni') }}"
                      />
                      <input
                        type="date"
                        name="date"
                        placeholder="fecha de nacimiento"
                        class="form-control mb-2"
                        value="{{ old('date') }}"
                      />

                      <input
                        type="tel"
                        name="dni_father"
                        placeholder="DNI del apoderado"
                        minlength="8"
                        maxlength="8"
                        required
                        class="form-control mb-2"
                        value="{{ old('fdni_father') }}"
                      />

                      <select name="seccion" placeholder="Seccion del Alumno" class="form-control mb-2" value="{{ old('seccion') }}">
                      <option>Inicial</option>
                      <option>Primaria</option>
                      <option>Secundaria</option>
                      </select>
                      
                      <input type="number" name="grado" placeholder= "Grado del Alumno" id="grado" class="form-control mb-2"/ min="0" max="6"  value="{{ old('grado') }}">
                        
                      
                      
                      <input 
                        type="email" 
                        class="form-control @error('email') is-invalid @enderror" 
                        name="email" 
                        value="{{ old('email') }}" 
                        placeholder="E-mail del Alumno"
                      />
                      <input type="radio" name="sexo" value="M" class="">Masculino
                      <br>
                      <input type="radio" name="sexo" value="F" class="">Femenino
                      <br>
                      <br>
                      <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
