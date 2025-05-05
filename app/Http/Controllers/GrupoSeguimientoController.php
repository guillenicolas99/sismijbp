<?php

namespace App\Http\Controllers;

use App\Models\Evangelismo;
use App\Http\Controllers\Controller;
use App\Models\GrupoSeguimiento;
use App\Models\Persona;
use App\Models\PersonaSeguimiento;
use App\Models\Red;
use App\Models\Telefonia;
use Illuminate\Http\Request;

class GrupoSeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $redes = Red::all();
        $grupos = GrupoSeguimiento::all();
        return view('evangelismos.index', compact('redes', 'grupos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $personas = Persona::all();
        return view('evangelismos.create', compact('personas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            // nombre generado automáticamente
            'fecha' => 'required|date',
            'red_id' => 'required|integer',
        ]);
        $this->addFlashMessage();

        $red = Red::find($data['red_id']);


        // nombre generado según la red y fecha seleccionada en español
        $data['nombre'] = $request->has('nombre') ? $request->nombre : 'Formato seguimiento red ' . $red->nombre . ' ' . date('F Y', strtotime($request->fecha));

        // return $data;

        GrupoSeguimiento::create($data);
        //     'nombre' => 'required|string|max:255',
        //     'mes' => 'required|date',
        //     'red_id' => 'required|integer',
        // ]);
        return redirect()->route('evangelismos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(GrupoSeguimiento $evangelismo)
    {
        $grupoPersonas = PersonaSeguimiento::where('grupo_seguimiento_id', $evangelismo->id)->orderBy('is_active', 'desc')->get();
        $personas = Persona::Where('red_id', $evangelismo->red_id)->get();
        $telefonias = Telefonia::all();
        return view('evangelismos.show', compact('evangelismo', 'grupoPersonas', 'personas', 'telefonias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(GrupoSeguimiento $evangelismo)
    {
        $redes = Red::all();
        return view('evangelismos.edit', compact('evangelismo', 'redes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GrupoSeguimiento $evangelismo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GrupoSeguimiento $evangelismo)
    {
        $deleted = $evangelismo;
        $evangelismo->delete();

        $this->deleteFlashMessage("Grupo de seguimiento $deleted->nombre");

        return redirect()->route('evangelismos.index');
    }
}
