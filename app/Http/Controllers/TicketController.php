<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use App\Models\Estado;
use App\Models\Evento;
use App\Models\Observacion;
use App\Models\Persona;
use App\Models\Red;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    public function asignarTicket($id)
    {
        $tickets = Ticket::where('evento_id', $id)->with('categoria', 'persona', 'estado')->paginate(25);
        $evento = Evento::find($id);
        $redes = Red::all();
        $personas = Persona::all();
        return view('tickets.asignar', compact('tickets', 'evento', 'redes', 'personas'));
    }

    public function getPersonas(Request $request, $redId)
    {
        $query = $request->input('query');

        $personas = Persona::where('red_id', $redId)
            ->when($query, function ($q) use ($query) {
                $q->where('nombre', 'LIKE', "%$query%");
            })
            ->get();

        return response()->json($personas);
    }

    public function asignarTicketPersona(Request $request, $ticketId)
    {
        $request->validate([
            'persona_id' => 'required|exists:personas,id',
        ]);

        $ticket = Ticket::findOrFail($ticketId);
        $ticket->persona_id = $request->persona_id;
        $ticket->save();

        return response()->json([
            'message' => 'Ticket asignado correctamente',
            'ticket' => $ticket->load('persona')
        ]);
    }

    public function agregarComentario(Request $request, $ticketId)
    {
        $request->validate([
            'comentario' => 'nullable|string|max:500',
            'comentario_interno' => 'nullable|string|max:500',
        ]);

        Observacion::create([
            'comentario' => $request->comentario,
            'comentario_interno' => $request->comentario_interno,
            'ticket_id' => $ticketId,
        ]);

        return redirect()->back()->with('success', 'Comentario agregado correctamente.');
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) {}

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    public function abonarTicket(Request $request, $codigo)
    {
        $request->validate([
            'abono' => 'required|numeric|min:0',
        ]);

        $ticket = Ticket::where('codigo', $codigo)->firstOrFail();

        if ($request->abono > $ticket->precio) {
            return redirect()->back()->withErrors(['abono' => 'El abono supera el monto adeudado.']);
        }

        $ticket->abono = $request->abono + $ticket->abono;

        if ($ticket->abono > $ticket->precio) {
            return redirect()->back()->withErrors(['abono' => 'El abono supera el monto adeudado.']);
        }
        if ($ticket->abono == $ticket->precio) {
            $ticket->estado_id = Estado::where('nombre', 'PAGADO')->value('id');
        } elseif ($ticket->abono > 0 && $ticket->abono < $ticket->precio) {
            $ticket->estado_id = Estado::where('nombre', 'ABONADO')->value('id');
        } else {
            $ticket->estado_id = Estado::where('nombre', 'SIN PAGAR')->value('id');
        }

        $ticket->save();

        return redirect()->back()->with('success', 'Abono registrado correctamente.');
    }




    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}
