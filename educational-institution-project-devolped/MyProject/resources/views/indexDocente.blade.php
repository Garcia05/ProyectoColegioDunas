@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="page-header">
                    <form method="GET" action="{{ route('docente.detalle') }}" class="form-inline pull-right">
                      @csrf
                      <input
                        type="text"
                        name="name"
                        placeholder="Nombre"
                        class="form-control"
                        value="{{ old('name') }}"
                      />
                      <input
                        type="text"
                        name="first_name"
                        placeholder="Primer Apellido"
                        class="form-control"
                        value="{{ old('first_name') }}"
                      />
                      <input
                        type="number"
                        name="dni"
                        placeholder="DNI"
                        class="form-control"
                        pattern="[0-9]{8}"
                        value="{{ old('dni') }}"
                      />
                      <button class="btn btn-success" type="submit">
                        BUSCAR
                      </button>
                    </form>
            </div>
            <br>
            <a class="btn btn-primary btn-block" href="{{ route('docentes.list') }}">LISTAR DOCENTES</a>
            <br>
            <div class="card">
                <div class="card-header">Listado de Docentes</div>
                <table class="table table-hover table-striped">
                  <thead>
                    <tr>
                      <th scope="col">DNI</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Primer Apellido</th>
                      <th scope="col">e-mail</th>
                    </tr>
                  </thead>
                  <tbody>
                  @forelse($docentes as $docente)
                    <tr>
                      <th> {{ $docente->dni_do}} </th>
                      <td> {{ $docente->name}} </td>
                      <td> {{ $docente->first_name}} </td>
                      <td> {{ $docente->email}} </td>
                      <td> 
                        <a class="btn btn-primary btn-block" href="{{route('cursos.list', $docente->dni_do)}}">
                            CURSOS
                        </a>
                      </td>
                    </tr>
                    @empty
                        <p><br>No hay docentes registrados.</p>
                    @endforelse
                  </tbody>
                </table>
                {!! $docentes->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
