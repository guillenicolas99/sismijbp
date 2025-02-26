<?php

namespace App\Http\Controllers;

use App\Models\Titulo;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TituloController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $titulos = Titulo::all();
        return view('titulos.index', compact('titulos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('titulos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'string|min:3|max:255|required'
        ]);

        Titulo::create($data);
        $this->setFlashMessage('success', 'Éxito', 'Nivel "' . $request->nombre . '" creado correctamente');
        return redirect()->route('titulos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Titulo $titulo)
    {
        $personas = $titulo->personas;
        return view('titulos.show', compact('titulo', 'personas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Titulo $titulo)
    {
        return view('titulos.edit', compact('titulo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Titulo $titulo)
    {
        $data = $request->validate([
            'nombre' => 'string|min:3|max:255|required'
        ]);

        $titulo->update($data);

        $this->setFlashMessage('success', 'Éxito', 'Nivel "' . $request->nombre . '" actualizado correctamente');
        return redirect()->route('titulos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Titulo $titulo)
    {
        $deleted = $titulo;
        $titulo->delete();

        $this->setFlashMessage('success', '¡Éxito!', 'Eliminado correctamente "' . $deleted->nombre . '"',);

        return redirect()->route('titulos.index');
    }
}
