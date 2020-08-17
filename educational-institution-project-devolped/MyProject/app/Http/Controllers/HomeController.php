<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Docente;
use App\Alumno;
use App\User;
use App\Role;
use App\Curso;
use App\Apoderado;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        
        $request->user()->authorizeRoles(['user','admin']);///'user','admin']);
        if($request->user()->authorizeUsers(['user'])){
            $docente = Docente::where('email',auth()->user()->email )->first();
            $cursos = Curso::where('fo_dni_do',$docente->dni_do)->get();
            //return print_r($cursos);
            return view('homeDocente',compact('cursos'));
            //return view('homeDocente');
        }
        else{
            return view('home');
        }
        
        //return view('home');
    }
    
    //DOCENTE
    
    public function indexDocente(Request $request)
    {
        $docentes = Docente::paginate(10);//all();
        return view('indexDocente',compact('docentes'));
        return $docentes;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }
    
    public function searchDocente(Request $request){
        $name  = trim($request->get('name'));
    	$first_name = trim($request->get('first_name'));
    	$dni  = trim($request->get('dni'));
    	$docentes = Docente::where('dni_do',$dni)->orWhere('first_name',$first_name)->orWhere('name',$name)->paginate(4);
    		/*->name($name)
    		->first_name($first_name)
    		->dni_do($dni)
    		->paginate(4);*/
    	
        return view('indexDocente',compact('docentes'));
    }
    
    public function saveDocente(Request $req)
    {
        $docentes = Docente::where('dni_do',$req->dni_do)->get();
        $usuarios = User::where('email',$req->email)->get();
        
        $_errores = [];
        if(count($docentes) != 0 || count($usuarios) != 0){
            if(count($docentes) != 0){
                array_push($_errores,'El DNI del docente ya existe.');
            }
            if(count($usuarios) != 0){
                array_push($_errores,'El email ya existe.');
            }
            return back()->withErrors($_errores)->withInput();
        }
        
        $user = new Docente;
        $user->name =$req->name;
        $user->first_name =$req->first_name;
        $user->last_name =$req->last_name;
        $user->dni_do =$req->dni_do;
        $user->date =$req->date;
        $user->status = true;
        $user->email =$req->email;
        $user->phone =$req->phone;
        $user->sexo =$req->sexo;
        $user->save();
        
        
        $user_a = new User();
        $user_a->name = $req->name;
        $user_a->email = $req->email;
        $user_a->password = Hash::make($req->dni_do);
        $user_a->save();
        $user_a->roles()->attach(Role::where('name', 'user')->first());
        $user_a->save();
        
        return back()->with('mensaje','Se registro al docente de forma correcta');
    }
    
    public function showDocente(Request $request)
    {
        $docente = Docente::findOrFail($request->dni);
        return $docente;
        //Esta función devolverá los datos de una tarea que hayamos seleccionado para cargar el formulario con sus datos
    }
    
    public function updateDocente(Request $request)
    {
        $docente = Docente::findOrFail($request->dni);

        $docente->name = $request->name;
        $docente->first_name = $request->first_name;
        $docente->last_name = $request->last_name;

        $docente->save();

        return $docente;
        //Esta función actualizará la tarea que hayamos seleccionado
    }
    
    public function destroy(Request $request)
    {
        $docente = Docente::destroy($request->dni);
        return $docente;
        //Esta función obtendra el dni de la tarea que hayamos seleccionado y la borrará de nuestra BD
    }
    
    
    
    // ALUMNO
    
    public function saveAlumno(Request $req)
    {
        //print_r($req->input());
        $apoderado = Apoderado::where('dni_apo',$req->dni_father)->get();
        $alumno = Alumno::where('dni_al',$req->dni)->get();
        $correo = Alumno::where('email',$req->email)->get();
        $_errores = [];
        if(count($apoderado) == 0 || count($alumno)!=0 ){
            if(count($apoderado) == 0){
                array_push($_errores,'El DNI del Apoderado no existe');
            }
            if(count($alumno)!=0){
                array_push($_errores,'El DNI del alumno ya esta registrado');
            }
            if($req->sexo==0){
                array_push($_errores,'Es necesario seleccionar el sexo del alumno');
            }
            if(count($correo)!=0){
                array_push($_errores,'El Email del alumno ya esta registrado');
            }
            return back()->withErrors($_errores)->withInput();
        }

        $user = new Alumno;
        $user->dni_al =$req->dni;
        $user->name =$req->name;
        $user->first_name =$req->first_name;
        $user->last_name =$req->last_name;
        $user->sexo = $req->sexo;
        $user->date =$req->date;
        $user->email =$req->email;
        $user->dni_father =$req->dni_father;
        $user->grado_alumno =$req->grado;
        $user->seccion_alumno =$req->seccion;
        $user->save(); 
        return back()->with('mensaje','Se registro el Alumno de forma correcta'); 
    }
    public function alumnoDatos(Request $request)
    {
        $alumnos = Alumno::paginate(10);
        return view('indexAlumno',compact('alumnos'));
        return $alumno;
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }
    public function findAlumno($id)
    {
        //
        $alumnos = Alumno::all();
        $index = 0;
        foreach ($alumnos as &$valor) {
            if ($valor->dni_father != $id){
                $alumnos->offsetUnset($index);
            }
            $index = $index+1;
        }
        return view('alumnoApoderado',compact('alumnos'));

        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }
    public function searchAlumno(Request $request)
    {
        //

        if($request){
            $dni_alumno = trim($request->get('dni'));
            $alumnos = Alumno::where('dni_al',$dni_alumno)->get();
            return view('indexAlumno',compact('alumnos'));
        }
        //Esta función nos devolvera todas las tareas que tenemos en nuestra BD
    }
    
}
