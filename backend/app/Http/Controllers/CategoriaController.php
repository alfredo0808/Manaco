<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return response()->json(Categoria::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validación
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'nullable'
        ]);

        $categoria = Categoria::create($request->all());

        return response()->json([
            'mensaje'=>'Categoria creada exitosamente',
            'categoria'=> $categoria
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // 
        $categoria = Categoria::find($id);

        if(!$categoria){

            return response()->json(
                [
                    'mensaje'=>'Categoria no encontrada'
                ],404
                );
        }

        return response()->json($categoria,200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //validación
        $request->validate([
            'nombre'=>'required',
            'descripcion'=>'nullable'
        ]);

        $categoria = Categoria::find($id);
        
        if(!$categoria){

            return response()->json(
                [
                    'mensaje'=>'Categoria no encontrada'
                ],404
                );
        }
        $categoria->update($request->all());
        
        return response()->json([
            'mensaje'=>'Categoria actualizada exitosamente',
            'categoria'=> $categoria
        ],201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $categoria = Categoria::find($id);

        if(!$categoria){

            return response()->json(
                [
                    'mensaje'=>'Categoria no encontrada'
                ],404
                );
    }
    $categoria->delete();

    return response()->json([
        'mensaje'=>'Categoria eliminada existosamente'
    ],200);
    }
}
