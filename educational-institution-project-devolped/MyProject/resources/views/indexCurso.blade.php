@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="page-header">
                    <h2> Docente: {{$identificador}} </h2>
                    <form method="GET" action="{{ route('curso.detalle', ['dni'=>$identificador]) }}" class="form-inline pull-right">
                      @csrf
                      <input
                        type="text"
                        name="name"
                        placeholder="Nombre"
                        class="form-control mb-2"
                        value="{{ old('name') }}"
                      />
                      <select id="grados" name="grados" class="form-control mb-2">
                            <option value=""></option>
                            <option value="inicial">Inicial</option>
                            <option value="primaria">Primaria</option>
                            <option value="secundaria">Secundaria</option>
                      </select>
                      <input
                        type="tel"
                        name="anio"
                        placeholder="AÑO"
                        class="form-control mb-2"
                        minlength="1"
                        maxlength="1"
                      />
                      <button class="btn btn-success mb-2" type="submit">
                        BUSCAR
                      </button>
                    </form>
            </div>
            <br>
            <div class="card-header">Listado de cursos : </div>
                <table>
                    <td> <a class="btn btn-secondary" href="{{route('mycursos.list', $identificador )}}">Mis Cursos</a> </td>
                    <td> <a class="btn btn-secondary" href="{{route('cursos.list', $identificador )}}">Todos los Cursos</a> </td>
                    <td> <a class="btn btn-warning" href="{{route('docentes.list')}}">Regresar a los docentes</a> </td>
                </table>
                <div class="card">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">GRADO</th>
                            <th scope="col">AÑO</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($cursos as $curso)
                            <tr>
                            <th> {{ $curso->id_curso}} </th>
                            <td> {{ $curso->nombre_curso}} </td>
                            <td> {{ $curso->grado}}</td>
                            <td> {{ $curso->anio}}</td>
                            <td>
                                @if($curso->status == true)
                                    <a class="btn btn-danger btn-block" href="{{route('delete.curso', ['id'=>$curso->id_curso,'dni'=>$identificador])}}">QUITAR</a>
                                @else
                                    <a class="btn btn-primary btn-block" href="{{route('add.curso', ['id'=>$curso->id_curso,'dni'=>$identificador])}}">AGREGAR</a>
                                @endif
                            </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
