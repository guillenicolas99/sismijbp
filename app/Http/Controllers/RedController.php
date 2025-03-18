<?php

namespace App\Http\Controllers;

use App\Models\Red;
use App\Http\Controllers\Controller;
use App\Models\Discipulado;
use App\Models\Persona;
use App\Models\Titulo;
use Illuminate\Http\Request;

class RedController extends Controller
{

    public function getMentores($redId)
    {
        $mentores = Persona::where('red_id', $redId)
            ->whereNotNull('titulo_id')
            ->whereNotIn('titulo_id', [1, 2, 3]) // Excluir títulos que no son aptos
            ->get(['id', 'nombre', 'titulo_id']);

        return response()->json($mentores);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $redes = Red::with('liderRed1', 'liderRed2')->get();
        return view('redes.index', compact('redes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $titulosSinDiscipulados = [1, 2, 3];
        $LideresRedIDs = Red::whereNotNull('lider_de_red_id')
            ->orWhereNotNull('lider_de_red_2_id')
            ->pluck('lider_de_red_id')
            ->merge(Red::whereNotNull('lider_de_red_2_id')->pluck('lider_de_red_2_id'))
            ->unique(); // Evita IDs duplicados

        $personasNoLideresDeRed = Persona::whereNotIn('id', $LideresRedIDs)
            ->whereNotIn('titulo_id', $titulosSinDiscipulados)
            ->get();

        return view('redes.create', compact('personasNoLideresDeRed'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|min:3|max:255|unique:redes',
            'lider_de_red_id' => 'required|unique:redes',
            'lider_de_red_2_id' => 'unique:redes'
        ]);

        $data['is_active'] = $request->has('is_active') ? $request->is_active : true;

        Red::create($data);
        $this->setFlashMessage('success', 'Éxito', "Red agregada");
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
            'nombre' => "required|min:3|max:255|unique:redes,nombre,{$red->id}",
            'lider_de_red_id' => "required|unique:redes,lider_de_red_id,{$red->id}",
            'is_active' => "required",
            'lider_de_red_2_id' => "unique:redes,lider_de_red_2_id,{$red->id}|nullable"
        ]);

        // return $data;
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
