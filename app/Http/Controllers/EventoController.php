<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Estado;
use App\Models\Red;
use App\Models\Ticket;
use Illuminate\Http\Request;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eventos = Evento::orderBy('fecha', 'asc')->get();
        return view('eventos.index', compact('eventos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('eventos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => 'required|string|min:3|max:255|unique:eventos',
            'fecha' => 'required|date',
            'cantidadPremium' => 'nullable|numeric',
            'precioPremium' => 'nullable|numeric',
            'descuentoPremium' => 'nullable|numeric',
            'cantidadVIP' => 'nullable|numeric',
            'precioVIP' => 'nullable|numeric',
            'descuentoVIP' => 'nullable|numeric',
            'cantidadGeneral' => 'nullable|numeric',
            'precioGeneral' => 'nullable|numeric',
            'descuentoGeneral' => 'nullable|numeric',
            'fechaDescuento' => 'nullable|date',
        ]);

        $data['fecha'] = date('Y-m-d', strtotime($data['fecha']));
        $data['is_active'] = $data['is_active'] ?? 1;
        $data['image_path'] = $data['image_path'] ?? null;

        $evento = Evento::create($data);

        // Ahora pasamos el ID correcto de categoría: 1 = Premium, 2 = VIP, 3 = General
        $this->StoreTickets(
            $data['cantidadPremium'],
            $data['precioPremium'],
            $data['descuentoPremium'],
            $evento->id,
            1, // Premium
            $data['fechaDescuento'] ?? null
        );

        $this->StoreTickets(
            $data['cantidadVIP'],
            $data['precioVIP'],
            $data['descuentoVIP'],
            $evento->id,
            2, // VIP
            $data['fechaDescuento'] ?? null
        );

        $this->StoreTickets(
            $data['cantidadGeneral'],
            $data['precioGeneral'],
            $data['descuentoGeneral'],
            $evento->id,
            3, // General
            $data['fechaDescuento'] ?? null
        );

        $this->addFlashMessage();
        return redirect()->route('eventos.index');
    }


    public function StoreTickets($cantidad, $precio, $descuento, $evento_id, $categoria_id, $fechaDescuento = null)
    {
        if (empty($cantidad) || empty($precio)) {
            return;
        }



        for ($i = 0; $i < $cantidad; $i++) {
            $codigo = $evento_id . '_' . $categoria_id . '_' . str_pad($i + 1, 3, '0', STR_PAD_LEFT);


            $ticket = new Ticket();
            $ticket->codigo = $codigo;
            $ticket->precio = $precio;
            $ticket->descuento = $descuento;
            $ticket->fecha_descuento = $fechaDescuento; // ahora sí respeta el input
            $ticket->abono = 0;
            $ticket->estado_id = 3; // Estado por defecto: 3 = sin pagar
            $ticket->persona_id = null; // Persona por defecto: null
            $ticket->evento_id = $evento_id;
            $ticket->categoria_id = $categoria_id;
            $ticket->save();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Evento $evento)
    {
        $query = $evento->tickets()->with(['persona', 'categoria', 'estado']);

        if ($request->filled('codigo')) {
            $query->where('codigo', 'like', '%' . $request->codigo . '%');
        }

        if ($request->filled('categoria_id')) {
            $query->where('categoria_id', $request->categoria_id);
        }

        if ($request->filled('estado_id')) {
            $query->where('estado_id', $request->estado_id);
        }

        if ($request->filled('red_id')) {
            $query->whereHas('persona', function ($q) use ($request) {
                $q->where('red_id', $request->red_id);
            });
        }

        $tickets = $query->paginate(20); // o ->get() si vas a exportar todo

        if ($request->tipo_accion === 'pdf') {
            return $this->generarPDF($tickets, $evento);
        }

        return view('eventos.show', [
            'evento' => $evento,
            'tickets' => $tickets,
            'categorias' => Categoria::all(),
            'estados' => Estado::all(),
            'redes' => Red::all(),
        ]);
    }

    public function getTicketInfo($codigo)
    {
        $ticket = Ticket::where('codigo', $codigo)->with('estado')->first();

        if (!$ticket) {
            return response()->json(['error' => 'Ticket no encontrada'], 404);
        }

        return response()->json([
            'codigo' => $ticket->codigo,
            'precio' => $ticket->precio,
            'abono' => $ticket->abono,
            'nombreResponsable' => $ticket->persona->nombres ?? 'N/A', // Asegúrate de tener relación
            'apellidoResponsable' => $ticket->persona->apellidos ?? '', // Asegúrate de tener relación
            'estado' => $ticket->estado->nombre ?? 'Desconocido',
            'categoria' => $ticket->categoria->nombre ?? 'Desconocido',
        ]);
    }

    public function generarPDF()
    {
        $tickets = Ticket::all();
        return view('eventos.pdf', compact('tickets'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        return view('eventos.edit', compact('evento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        $data = $request->validate([
            'nombre' => "required|string|min:3|max:255|unique:eventos,nombre,{$evento->id}",
            'fecha' => 'required|date',
            'is_active' => 'required|boolean',
        ]);


        $evento->update($data);

        $this->updateFlashMessage();

        return redirect()->route('eventos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        $deleted = $evento;
        $evento->delete();

        $this->deleteFlashMessage("Evento $deleted->nombre");

        return redirect()->route('eventos.index');
    }
}
