@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Docente</div>
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
                    <form method="POST" action="{{ route('docentes.registro') }}">
                        @csrf
                      <input
                        type="tel"
                        name="dni_do"
                        placeholder="DNI"
                        class="form-control mb-2"
                        minlength="8"
                        maxlength="8"
                        required
                        value="{{ old('dni_do') }}"
                      />
                      <input
                        type="text"
                        name="name"
                        placeholder="Nombre"
                        class="form-control mb-2"
                        required
                        value="{{ old('name') }}"
                      />
                      <input
                        type="text"
                        name="first_name"
                        placeholder="Primer Apellido"
                        class="form-control mb-2"
                        required
                        value="{{ old('first_name') }}"
                      />
                      <input
                        type="text"
                        name="last_name"
                        placeholder="Segundo Apellido"
                        class="form-control mb-2"
                        required
                        value="{{ old('last_name') }}"
                      />
                      <input
                        type="email"
                        name="email"
                        placeholder="Correo Electronico"
                        class="form-control mb-2"
                        required
                        value="{{ old('email') }}"
                      />
                      <input
                        type="tel"
                        name="phone"
                        placeholder="Numero de Telefono"
                        class="form-control mb-2"
                        pattern="[0-9]{9}"
                        minlength="9"
                        maxlength="9"
                        value="{{ old('phone') }}"
                      />

                      <input
                        type="date"
                        name="date"
                        placeholder="fecha de nacimiento"
                        class="form-control mb-2"
                        min="1900-01-01"
                        max="2100-12-31"
                        required
                        value="{{ old('date') }}"
                      />
                      
                      <input 
                        type="radio"
                        name="sexo"
                        value="M"
                        required
                        >Masculino
                      <br>
                      <input
                        type="radio"
                        name="sexo"
                        value="F"
                        required
                        >Femenino
                      <br>
                      
                      <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
