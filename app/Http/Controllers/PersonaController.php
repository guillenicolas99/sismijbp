<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Controllers\Controller;
use App\Models\Red;
use App\Models\Titulo;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $personas = Persona::all();
        return view('personas.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $redes = Red::all();
        $titulos = Titulo::all();
        return view('personas.create', compact('redes', 'titulos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'genero' => 'required',
            'telefono' => 'required|string|max:8',
            'cedula' => 'nullable|string',
            'red_id' => 'required',
            'titulo_id' => 'required',
        ]);

        // Si is_active no está en el request, lo establecemos en true
        $data['is_active'] = $request->has('is_active') ? $request->is_active : true;

        Persona::create($data);

        $this->setFlashMessage('success', '¡Éxito!', 'Creado correctamente');
        return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        $redes = Red::all();
        $titulos = Titulo::all();
        return view('personas.edit', compact('persona', 'redes', 'titulos'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'genero' => 'required',
            'telefono' => 'required|string|max:8',
            'cedula' => 'nullable|string',
            'is_active' => 'required',
            'red_id' => 'required',
            'titulo_id' => 'required',
        ]);

        $persona->update($data);

        $this->setFlashMessage('success', '¡Éxito!', 'Actualizado correctamente');

        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        //
    }
}
