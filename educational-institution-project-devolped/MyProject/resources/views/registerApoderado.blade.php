@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Apoderado</div>
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
                    <form method="POST" action="{{ route('apoderados.registro') }}">
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
                        type="email"
                        name="email"
                        placeholder="Correo Electronico"
                        class="form-control mb-2"
                        value="{{ old('email') }}"
                      />
                      <input
                        type="tel"
                        name="phone"
                        placeholder="Numero de Telefono"
                        class="form-control mb-2"
                        minlength="9"
                        maxlength="9"
                        value="{{ old('phone') }}"

                      />
                      <input type="radio" name="sexo" value="M" class="">Masculino
                      <br>
                      <input type="radio" name="sexo" value="F" class="">Femenino
                      <br>
                      <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
