@extends('layouts.app')

<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Registrar Curso</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('cursos.registro') }}">
                        @csrf
                        <input
                            type="text"
                            name="nombre_curso"
                            placeholder="Nombre del Curso"
                            class="form-control mb-2"
                        />
                        <select id="grados" name="grados" class="form-control mb-2">
                            <option value="inicial">Inicial</option>
                            <option value="primaria">Primaria</option>
                            <option value="secundaria">Secundaria</option>
                        </select>
                        <input type="checkbox" id="anio1" name="anio[]" value="1" >Primero
                        <input type="checkbox" id="anio2" name="anio[]" value="2">Segundo
                        <input type="checkbox" id="anio3" name="anio[]" value="3">Tercero
                        <input type="checkbox" id="anio4" name="anio[]" value="4">Cuarto
                        <input type="checkbox" id="anio5" name="anio[]" value="5">Quinto
                        <input type="checkbox" id="anio6" name="anio[]" value="6">Sexto(si es primaria)
                        <br>
                        <br>
                        <button class="btn btn-primary btn-block" type="submit">Agregar</button>
                    </form> 
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function (e) {
    var grado = document.getElementById('grados');
    $('#grados').change(function() {
        if(grado.value == 'secundaria' ){
            document.getElementById('anio6').checked = false;
            document.getElementById('anio5').checked = true;
            document.getElementById('anio4').checked = true;
            document.getElementById('anio3').checked = true;
            document.getElementById('anio2').checked = true;
            document.getElementById('anio1').checked = true;
        }
        else if(grado.value == 'primaria' ){
            document.getElementById('anio6').checked = true;
            document.getElementById('anio5').checked = true;
            document.getElementById('anio4').checked = true;
            document.getElementById('anio3').checked = true;
            document.getElementById('anio2').checked = true;
            document.getElementById('anio1').checked = true;
        }
        else{
            document.getElementById('anio6').checked = false;
            document.getElementById('anio5').checked = false;
            document.getElementById('anio4').checked = false;
            document.getElementById('anio3').checked = false;
            document.getElementById('anio2').checked = false;
            document.getElementById('anio1').checked = false;
        }
    })
});
</script>
@endsection
