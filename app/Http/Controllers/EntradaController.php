<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use App\Http\Requests\EntradaRequest;

class EntradaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $regitros=Entrada::where('placa','fecha','%'.$texto . '%' )->paginate(10);
        return view('entrada.index',compact('registros','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $entrada= new entrada();
        return view('entrada.action',['entrada'=>new entrada()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $registro = new Entrada;
        $registro->placa=$request->input('placa');
        $registro->fecha="";
        return response()->json([
            'status'=> 'success',
            'message'=>'Registro creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrada $entrada)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Entrada $entrada)
    {
        $entrada=Entrada::findOrFail($id);
        return view('entrada.action',compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entrada $entrada)
    {
        $entrada=Entrada::findOrFail($id);
        $entrada->placa=$request->placa;
        $categoria->save();

        return response()->json([
            'status'=> 'success',
            'message'=> 'Actualización de datos satisfactoria'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registro =Entrada::findOrFail($id);
        $registro->delete();

        return response()->json([
            'status'=> 'success',
            'message'=> 'Actualización de datos satisfactoria'
        ]);
    }
}
