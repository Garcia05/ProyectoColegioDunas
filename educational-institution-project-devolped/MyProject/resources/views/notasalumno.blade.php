@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Notas : </div>
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th scope="col">Nombres del Alumno</th>
                      <th scope="col">Nombres del Docente</th>
                      <th scope="col">Fecha de registro</th>
                      <th scope="col">Nota</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($notas as $alumno)
                    <tr>
                      <th> {{ $alumno->dni_reg_alu}} </th>
                      <td> {{ $alumno->dni_reg_doc}} </td>
                      <td> {{ $alumno->fecha_registro}} </td>
                      <td> {{ $alumno->nota}} </td>
                    </tr>
                    @empty
                        <p><br>No hay Notas registradas.</p>
                    @endforelse
                  </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection