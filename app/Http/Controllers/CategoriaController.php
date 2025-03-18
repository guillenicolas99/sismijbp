<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'string|min:3|max:255|required|unique:categorias'
        ]);

        Categoria::create($data);
        $this->setFlashMessage('success', 'éxito', 'Categoría creada correctamente');
        return redirect()->route('categorias.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        return view('categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categoria $categoria)
    {
        $data = $request->validate([
            'nombre' => "required|string|min:3|max:255|unique:categorias,nombre,{$categoria->id}"
        ]);


        $categoria->update($data);

        $this->setFlashMessage('success', '¡Éxito!', 'Actualizado correctamente');

        return redirect()->route('categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $deleted = $categoria;

        $categoria->delete();

        $this->setFlashMessage('success', '¡Éxito!', 'Eliminado correctamente "' . $deleted->nombre . '"',);

        return redirect()->route('categorias.index');
    }
}
