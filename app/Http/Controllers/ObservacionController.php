<?php

namespace App\Http\Controllers;

use App\Models\Observacion;
use Illuminate\Http\Request;

class ObservacionController extends Controller
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
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'comentario' => 'nullable|string|max:500',
            'comentario_interno' => 'nullable|string|max:500',
        ]);

        Observacion::create([
            'comentario' => $request->comentario,
            'comentario_interno' => $request->comentario_interno,
            'ticket_id' => $request->ticket_id,
        ]);

        return redirect()->back()->with('success', 'Comentario agregado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Observacion $observacion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Observacion $observacion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Observacion $observacion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Observacion $observacion)
    {
        //
    }
}
