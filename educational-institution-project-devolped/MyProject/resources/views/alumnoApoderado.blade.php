@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de alumnos</div>
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th scope="col">DNI</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Primer Apellido</th>
                      <th scope="col">Segundo Apellido</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($alumnos as $alumno)
                    <tr>
                      <th> {{ $alumno->dni_al}} </th>
                      <td> {{ $alumno->name}} </td>
                      <td> {{ $alumno->first_name}} </td>
                      <td> {{ $alumno->last_name}} </td>
                    </tr>
                    @empty
                        <p><br>No hay alumnos registrados.</p>
                    @endforelse
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
