<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\PersonaSeguimiento;
use Illuminate\Http\Request;

class PersonaSeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombres' => 'required|string|min:3|max:255',
            'apellidos' => 'required|string|min:3|max:255',
            'telefono' => 'required|string|max:8|unique:personas',
            'fecha' => 'required|date',
            'edad' => 'required|integer',
            'genero' => 'required',
            'direccion' => 'required|string|min:3|max:255',
            'correo' => 'required|string|email|unique:personas',
            'invitacion' => 'required|in:Miembro,Invitado,1ra vez',
            'consolidador_id' => 'required',
            'telefonia_id' => 'nullable|exists:telefonias,id',
            'comentario_id' => 'nullable|exists:comentarios,id',
            'persona_id' => 'nullable|exists:personas,id',
            'grupo_seguimiento_id' => 'nullable|exists:grupos_seguimientos,id',
        ]);

        // return $request;

        PersonaSeguimiento::create($data);

        $this->addFlashMessage();
        return redirect()->route('evangelismos.show', $data['grupo_seguimiento_id']);
    }

    /**
     * Display the specified resource.
     */
    public function show(PersonaSeguimiento $personasSeguimiento)
    {
        // return $personasSeguimiento;
        $comentarios = Comentario::where('persona_seguimiento_id', $personasSeguimiento->id)->orderBy('created_at', 'desc')->get();
        return view('personasSeguimientos.show', compact('personasSeguimiento', 'comentarios'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PersonaSeguimiento $personasSeguimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PersonaSeguimiento $personasSeguimiento)
    {
        //
    }

    public function setDisable($id)
    {
        // return $id;
        $persona = PersonaSeguimiento::findOrFail($id);
        $persona->is_active = false;
        $persona->save();

        return redirect()->back()->with('success', 'Persona desactivada correctamente.');
    }

    public function setEnable($id)
    {
        // return $id;
        $persona = PersonaSeguimiento::findOrFail($id);
        $persona->is_active = true;
        $persona->save();

        return redirect()->back()->with('success', 'Persona activada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PersonaSeguimiento $personasSeguimiento)
    {
        //
    }
}
