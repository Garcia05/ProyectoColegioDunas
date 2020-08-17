@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Listado de apoderados</div>
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
                  @forelse($apoderados as $apoderado)
                    <tr>
                      <th> {{ $apoderado->dni_apo}} </th>
                      <td> {{ $apoderado->name}} </td>
                      <td> {{ $apoderado->first_name}} </td>
                      <td> {{ $apoderado->last_name}} </td>
                      <td> 
                        <a href="{{route('apoderados.detalle', $apoderado->dni_apo)}}">
                            Alumnos
                        </a>
                      </td>
                    </tr>
                    @empty
                        <p><br>No hay apoderados registrados.</p>
                    @endforelse
                  </tbody>
                </table>
                {!! $apoderados->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
