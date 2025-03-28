<?php

namespace App\Http\Controllers;

use App\Models\Evangelismo;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Http\Request;

class EvangelismoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('evangelismos.index');
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
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(Evangelismo $evangelismo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evangelismo $evangelismo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evangelismo $evangelismo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evangelismo $evangelismo)
    {
        //
    }
}
