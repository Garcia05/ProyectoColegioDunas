<?php

namespace App\Http\Controllers;

use App\Apoderado;
use Illuminate\Http\Request;

class ApoderadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $apoderados = Apoderado::paginate(10);//all();
        return view('indexApoderado',compact('apoderados'));
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
        //
        $apoderado = Apoderado::where('dni_apo',$req->dni)->get();
        $usuarios = Apoderado::where('email',$req->email)->get();
        $phone = Apoderado::where('phone',$req->phone)->get();
        $_errores = [];
        if(count($apoderado) != 0 || count($phone) != 0 || count($usuarios) != 0 ){
            if(count($apoderado) !=0){
                array_push($_errores,'El DNI del Apoderado ya se encuentra registrado ');
            }
            if(count($phone) != 0){
                array_push($_errores,'El Telefono del Apoderado ya se encuentra registrado ');
            }
            if(count($usuarios) != 0){
                array_push($_errores,'El email ya existe.');
            }
            
            return back()->withErrors($_errores)->withInput();
        }
        $user = new Apoderado;
        $user->name =$req->name;
        $user->first_name =$req->first_name;
        $user->last_name =$req->last_name;
        $user->dni_apo =$req->dni;
        $user->status = true;
        $user->email =$req->email;
        $user->phone =$req->phone;
        $user->sexo = $req->sexo;
        $user->save();
        return back()->with('mensaje','Se registro el Apoderado de forma correcta');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function show(Apoderado $apoderado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function edit(Apoderado $apoderado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Apoderado $apoderado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Apoderado  $apoderado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Apoderado $apoderado)
    {
        //
    }
}
