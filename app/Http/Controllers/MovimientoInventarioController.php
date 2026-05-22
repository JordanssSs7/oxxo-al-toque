<?php

namespace App\Http\Controllers;

use App\Models\MovimientoInventario;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovimientoInventarioController extends Controller
{
    public function index()
    {
        $movimientos = MovimientoInventario::with(['producto', 'usuario'])->latest()->get();
        return view('inventarios.index', compact('movimientos'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('inventarios.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'tipo'        => 'required|in:entrada,salida',
            'cantidad'    => 'required|integer|min:1',
            'motivo'      => 'required|string|max:255',
        ]);

        MovimientoInventario::create([
            'producto_id' => $request->producto_id,
            'tipo'        => $request->tipo,
            'cantidad'    => $request->cantidad,
            'motivo'      => $request->motivo,
            'user_id'     => Auth::id(), 
        ]);

        return redirect()->route('inventarios.index')
            ->with('success', 'Movimiento de inventario registrado correctamente.');
    }
}
