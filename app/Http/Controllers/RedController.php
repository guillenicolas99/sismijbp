<?php

namespace App\Http\Controllers;

use App\Models\Red;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;

class RedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $redes = Red::all();
        return view('redes.index', compact('redes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personas = Persona::all();
        return view('redes.create', compact('personas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => ['required', 'min:3', 'max:255'],
            'lider_de_red' => ['required']
        ]);

        $data['is_active'] = $request->has('is_active') ? $request->is_active : true;

        Red::create($data);
        return redirect()->route('redes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Red $red)
    {
        $personas = $red->personas;
        return view('redes.show', compact('red', 'personas'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Red $red)
    {
        $personas = Persona::all();
        return view('redes.edit', compact('red', 'personas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Red $red)
    {
        $data = $request->validate([
            'nombre' => ['required', 'min:3', 'max:255'],
            'is_active' => ['required'],
            'lider_de_red' => ['required']
        ]);

        $red->update($data);
        $this->setFlashMessage('success', '¡Éxito!', 'Actualizado correctamente');
        return redirect()->route('redes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Red $red)
    {
        $deleted = $red;
        $red->delete();
        $this->setFlashMessage('success', 'Éxito', '"' . $deleted->nombre . '" eliminado correctamente');
        return redirect()->route('redes.index');
    }
}
