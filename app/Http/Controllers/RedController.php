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
            'nombre' => ['required', 'min:3', 'max:255', 'unique'],
            'lider_de_red' => ['required', 'min:3', 'max:255']
        ]);

        Red::create($data);
        return redirect()->route('redes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Red $red)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Red $red)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Red $red)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Red $red)
    {
        //
    }
}
