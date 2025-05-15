<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Http\Controllers\Controller;
use App\Models\Discipulado;
use App\Models\Red;
use App\Models\Telefonia;
use App\Models\Titulo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $telefonias = Telefonia::all();
        return view('personas.create', compact('redes', 'titulos', 'discipulados', 'telefonias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres' => 'required|string|min:3|max:255',
            'apellidos' => 'required|string|min:3|max:255',
            'direccion' => 'required|string|min:3|max:255',
            'departamento' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|in:M,F',
            'telefono' => 'required|string|max:8|unique:personas,telefono',
            'correo' => 'required|email|unique:personas,correo',
            'cedula' => 'nullable|string|unique:personas,cedula',
            'telefonia_id' => 'nullable|exists:telefonias,id',
            'is_baptized' => 'required|boolean',
            'is_single' => 'required|boolean',
            'red_id' => 'nullable|exists:redes,id',
            'titulo_id' => 'nullable|exists:titulos,id',
        ]);

        // Asegúrate de establecer is_active si no viene
        $data['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;

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
        $telefonias = Telefonia::all();
        return view('personas.edit', compact('persona', 'telefonias', 'redes', 'titulos', 'discipulados'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Persona $persona)
    {
        $data = $request->validate([
            'nombres' => 'required|string|min:3|max:255',
            'apellidos' => 'required|string|min:3|max:255',
            'direccion' => 'required|string|min:3|max:255',
            'departamento' => 'required|string|max:100',
            'fecha_nacimiento' => 'required|date',
            'genero' => ['required', Rule::in(['M', 'F'])],

            'telefono' => [
                'required',
                'string',
                'max:8',
                Rule::unique('personas', 'telefono')->ignore($persona->id),
            ],

            'correo' => [
                'required',
                'email',
                Rule::unique('personas', 'correo')->ignore($persona->id),
            ],

            'cedula' => [
                'nullable',
                'string',
                Rule::unique('personas', 'cedula')->ignore($persona->id),
            ],

            'telefonia_id' => 'nullable|exists:telefonias,id',
            'is_baptized' => 'required|boolean',
            'is_single' => 'required|boolean',
            'red_id' => 'nullable|exists:redes,id',
            'titulo_id' => 'nullable|exists:titulos,id',
            'discipulado_id' => 'nullable|exists:discipulados,id',
        ]);

        // Si el campo `is_active` se gestiona con un checkbox, puedes agregar esta lógica (opcional):
        $data['is_active'] = $request->has('is_active') ? $request->boolean('is_active') : true;

        $persona->update($data);

        $this->updateFlashMessage(); // Muestra el mensaje de éxito

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
