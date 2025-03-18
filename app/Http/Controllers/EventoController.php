<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EventoController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::orderBy('fecha', 'asc')->get();
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('eventos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:3|max:255|unique:eventos',
            'fecha' => 'required|date',
            'is_active' => 'required|boolean',
        ]);

        Evento::create($data);
        $this->setFlashMessage('success', '¡Éxito!', 'Creado correctamente');
        return redirect()->route('eventos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        $data = $request->validate([
            'nombre' => "required|string|min:3|max:255|unique:eventos,nombre,{$evento->id}",
            'fecha' => 'required|date',
            'is_active' => 'required|boolean',
        ]);


        $evento->update($data);

        $this->setFlashMessage('success', '¡Éxito!', 'Actualizado correctamente');

        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        $deleted = $evento;
        $evento->delete();

        $this->setFlashMessage('success', '¡Éxito!', 'Eliminado correctamente "' . $deleted->nombre . '"',);

        return redirect()->route('eventos.index');
    }
}
