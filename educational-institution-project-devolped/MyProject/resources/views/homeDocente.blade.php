@extends('layouts.user')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @forelse($cursos as $curso)
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header"> {{ $curso->nombre_curso}}</div>
                        <div class="col-md-4">
                        <p><strong><span style="text-transform: uppercase;">{{ $curso->grado}}</span> <span style="text-transform: uppercase;float: right">{{ $curso->anio}}</span> </strong></p>
                        </div>
                        <table class="table table-hover table-striped">
                    <tr>
                        <td> <a class="btn btn-secondary" href="">Lista de Alumnos</a></td>
                        <td> <a class="btn btn-secondary" href="">Horario</a></td>
                    </tr>
                    </table>
                </div>
                <br>
            </div>
        @empty
            <p><br>No tiene cursos asignados.</p>
        @endforelse
    </div>
</div>
@endsection
