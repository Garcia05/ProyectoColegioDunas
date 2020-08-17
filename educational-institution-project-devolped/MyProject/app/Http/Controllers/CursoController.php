<?php

namespace App\Http\Controllers;
use App\Lcursos;
use App\Curso;
use App\Alumno;
use Illuminate\Http\Request;

class CursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $cursos = Curso::where('status',false)->get();
        $identificador = $id;
        return view('indexCurso',compact('cursos','identificador'));
    }
    
    public function index_my($id)
    {
        //
        $cursos = Curso::where('fo_dni_do',$id)->get();
        $identificador = $id;
        return view('indexCurso',compact('cursos','identificador'));
    }


    public function find_cursos($dni, Request $request)
    {
        $identificador = $dni;
        $name = $request->get('name');
        $grade = $request->get('grados');
        $anio = $request->get('anio');
        $cursos = Curso::orderBy('id_curso','DESC')->name($name)->grado($grade)->anio($anio)->get();
        return view('indexCurso',compact('cursos','identificador'));
        /*if($request->get('grados') != null){
            $cursos = Curso::where('grado','LIKE',$grade)->get();
        }
        else{
            $cursos = Curso::where('nombre_curso','LIKE',$name)->where('grado','LIKE',$grade)->where('anio','LIKE',$anio)->get();
        }
        $identificador = $dni;
        return view('indexCurso',compact('cursos','identificador'));
        */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        if($req->grados == 'inicial'){
            $user = new Curso;
            $user->nombre_curso =$req->nombre_curso;
            $user->grado =$req->grados;
            $user->status = false;
            $user->save();
        }
        else{
            foreach($req->get('anio') as $values){
                $user = new Curso;
                $user->nombre_curso =$req->nombre_curso;
                $user->grado =$req->grados;
                $user->anio = $values;
                $user->status = false;
                $user->save();
            }
        }
        return back(); 
        
        

        $user->area =$req->area;
        $user->status =false;
        $user->save();
        
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function show(Curso $curso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function edit(Curso $curso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        Curso::where('id_curso', $request->id_curso)->update(['fo_dni_do' => $request->dni_docente, 'status' => true]);
        return back()->with('mensaje','Se agrego la nota de forma correcta');
    }
    public function add($dni , $id)
    {
        Curso::where('id_curso', $id)->update(['fo_dni_do' => $dni, 'status' => true]);
        return back()->with('mensaje','Curso agregado');
    }
    public function delete($dni,$id){
        //return $id;
        Curso::where('id_curso', $id)->update(['fo_dni_do' => null, 'status' => false]);
        return back()->with('mensaje','Curso quitado');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Curso  $curso
     * @return \Illuminate\Http\Response
     */
    public function AsignarCurso(Request $req)
    {
        $alumno = Alumno::where('dni_al',$req->dni)->get();
        $lleva_curso1 = Lcursos::where('id_curso',$req->id_curso2)->get();
        $lleva_curso = Lcursos::where('dni_alumno',$req->dni)->get();
        $_errores = [];
        if( count($alumno)==0 || (count($lleva_curso)!=0 && count($lleva_curso1)!=0)  ){
            if( count($alumno)==0){
                array_push($_errores,'El DNI del alumno no esta registrado');
            }
            if(count($lleva_curso)!=0 && count($lleva_curso1)!=0){
                array_push($_errores,'El alumno ya tiene registrado el curso con su año');
            }
            return back()->withErrors($_errores)->withInput();
        }
        
        $user = new Lcursos;
        $user->dni_alumno =$req->dni;
        $user->id_curso=$req->id_curso2;
        $user->save();
        return back()->with('mensaje','Se registro el Alumno de forma correcta');
    }
    public function destroy(Curso $curso)
    {
        //
    }
}
