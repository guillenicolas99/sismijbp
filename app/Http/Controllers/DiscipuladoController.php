<?php

namespace App\Http\Controllers;

use App\Models\Discipulado;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\Red;
use Illuminate\Http\Request;

class DiscipuladoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $discipulados = Discipulado::with(['mentor_1', 'mentor_2', 'red'])->get();

        // return $discipulados;
        return view('discipulados.index', compact('discipulados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $discipulados = Discipulado::whereNotNull('mentor_1_id')
            ->orWhereNotNull('mentor_2_id')
            ->pluck('mentor_1_id')
            ->merge(Discipulado::whereNotNull('mentor_2_id')->pluck('mentor_2_id'))
            ->unique(); // Evita IDs duplicados

        $titulosSinDiscipulados = [1, 2, 3];

        $mentores = Persona::with('titulo', 'red')
            ->whereNotIn('titulo_id', $titulosSinDiscipulados)
            ->whereNotIn('id', $discipulados)
            ->get();


        // return $mentores;
        $redes = Red::all();
        return view('discipulados.create', compact('mentores', 'redes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'mentor_1_id' => 'required|unique:discipulados',
            'mentor_2_id' => 'unique:discipulados',
            'red_id' => 'required',
        ]);

        // $data['is_active'] = $request->has('is_active') ? $request->is_active : true;

        // return $data;
        Discipulado::create($data);
        $this->addFlashMessage();
        return redirect()->route('discipulados.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Discipulado $discipulado)
    {
        return view('discipulados.show', compact('discipulado'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Discipulado $discipulado)
    {
        $mentores = Persona::all();
        $redes = Red::all();
        return view('discipulados.edit', compact('discipulado', 'mentores', 'redes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Discipulado $discipulado)
    {
        $data = $request->validate([
            'mentor_1_id' => "required|unique:discipulados,mentor_1_id,{$discipulado->id}",
            'mentor_2_id' => "unique:discipulados,mentor_2_id,{$discipulado->id}",
            'is_active' => 'required|boolean',
            'red_id' => 'required',
        ]);

        // return $data;
        $discipulado->update($data);
        $this->updateFlashMessage();
        return redirect()->route('discipulados.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Discipulado $discipulado)
    {
        //
    }
}
