<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Controllers\Controller;
use App\Models\Discipulado;
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
        $personas = Persona::paginate(10);
        return view('personas.index', compact('personas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $redes = Red::all();
        $titulos = Titulo::all();
        $discipulados = Discipulado::all();
        return view('personas.create', compact('redes', 'titulos', 'discipulados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:3|max:255',
            'genero' => 'required',
            'telefono' => 'required|string|max:8|unique:personas',
            'cedula' => 'nullable|string|unique:personas',
            'is_baptized' => 'required|boolean',
            'is_single' => 'required|boolean',
            'red_id' => 'nullable',
            'titulo_id' => 'required',
            'discipulado_id' => 'nullable',
        ]);

        // Si is_active no está en el request, lo establecemos en true
        $data['is_active'] = $request->has('is_active') ? $request->is_active : true;
        // 
        // return $request;
        Persona::create($data);

        $this->addFlashMessage();
        return redirect()->route('personas.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Persona $persona)
    {
        return "Vista del discípulo <strong>{$persona->nombre}</strong>";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Persona $persona)
    {
        $redes = Red::all();
        $titulos = Titulo::all();
        $discipulados = Discipulado::all();
        return view('personas.edit', compact('persona', 'redes', 'titulos', 'discipulados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        $data = $request->validate([
            'nombre' => "required|string|min:3|max:255|unique:personas,nombre,{$persona->id}",
            'genero' => 'required',
            'telefono' => "required|string|max:8|unique:personas,telefono,{$persona->id}",
            'cedula' => "nullable|string|unique:personas,cedula,{$persona->id}",
            'is_active' => 'required|boolean',
            'is_baptized' => 'required|boolean',
            'is_single' => 'required|boolean',
            'red_id' => 'nullable',
            'titulo_id' => 'nullable',
            'discipulado_id' => 'nullable|exists:discipulados,id',
        ]);

        $data['discipulado_id'] = $request->has('discipulado_id') ? $request->discipulado_id : null;

        $persona->update($data);

        $this->updateFlashMessage();

        return redirect()->route('personas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Persona $persona)
    {
        $deleted = $persona;
        $persona->delete();

        $this->deleteFlashMessage($deleted->nombre);

        return redirect()->route('personas.index');
    }
}
