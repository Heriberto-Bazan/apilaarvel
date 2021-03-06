<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaCreateRequest;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return $empresas;
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
    public function store(EmpresaCreateRequest $request)
    {
        $empresa = new Empresa();
        $empresa->nombre = $request->nombre;
        $empresa->correo = $request->correo;

        if($request->hasfile('logotipo')){

            $imagen         =   $request->file('logotipo');
            $nombreimagen   =   time().'.'.$imagen->getClientOriginalExtension();
            $nuevaruta      =   public_path('storage/app/public'.$nombreimagen);
            $imagen->move($nuevaruta,$nombreimagen);  
            copy($imagen->getRealPath(),$nuevaruta);     
            $empresa->logotipo  = $nombreimagen; // asignar el nombre para guardar
            
        }
          
        $empresa->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $empresa = Empresa::findOrFail($request->id);
        $empresa->nombre = $request->nombre;
        $empresa->correo = $request->correo;
        $empresa->logotipo = $request->logotipo;

        return $empresa;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $empresa = Empresa::findOrFail($request->id);
        $empresa->nombre = $request->nombre;
        $empresa->correo = $request->correo;
        $empresa->logotipo = $request->logotipo;

        $empresa->save();
        return $empresa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $empresa = Empresa::destroy($request->id);
        return $empresa;
    }
}
