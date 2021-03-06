@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
  <div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
    <form method="GET" action="{{ route('alumno.detalle') }}">
          <input  type="text"  name="dni" placeholder="DNI del alumno" class= "form-control mb-2"  />
          <button class="btn btn-primary btn-block" type="submit">Buscar Alumno</button>   
   </form> 
  </div>
</div>
</div>
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="card-header">Listado de Alumnos : </div>
            <div class="card">

               <table class="table table-hover table-striped">
                <thead>
                  <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Primer Apellido</th>
                    <th scope="col">Segundo Apellido</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Fecha de nacimiento</th>
                    <th scope="col">Email</th>
                    <th scope="col">DNI del Apoderado</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Nivel</th>
                    <th scope="col">Opciones</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($alumnos as $alumno)
                    <tr>
                      <form method="POST" action="{{ route('actualizar.datos',['dni_al'=>$alumno->dni_al]) }}">
                        @csrf @method('PUT')
                      <td name="dni_al" value = "{{ $alumno->dni_al}}"> {{ $alumno->dni_al}} </td>
                      <td> {{ $alumno->name}} </td>
                      <td> {{ $alumno->first_name}} </td>
                      <td> {{ $alumno->last_name}} </td>
                      <td> {{ $alumno->sexo}} </td>
                      <td> {{ $alumno->date}} </td>
                      <td> {{ $alumno->email}} </td>
                      <td> {{ $alumno->dni_father}} </td>
                      <td> <input type="text" size="1" maxlength="15" value="{{ $alumno->grado_alumno}}" name="grado_alumno"> </td>
                      <td> <select name="seccion" placeholder="Seccion del Alumno" class="form-control mb-2" value="{{ $alumno->seccion}}">
                      <option>Inicial</option>
                      <option>Primaria</option>
                      <option>Secundaria</option>
                      </select> <input type="text" size="8" maxlength="15" value="{{ $alumno->seccion_alumno}}" name="nombre"> </td>
                      <td><a class="btn btn-primary btn-block" href="{{route('notas.detalle', ['dni_al'=>$alumno->dni_al])}}"> Notas </a></td>
                      <td>
                      <button class="btn btn-success mb-2" type="submit">
                        Actualizar
                      </button>
                    </form>
                      </td>
                    </tr>
                @endforeach
                </tbody>
              </table>      
              </form>         
        </div>
    </div>
</div>

@endsection
