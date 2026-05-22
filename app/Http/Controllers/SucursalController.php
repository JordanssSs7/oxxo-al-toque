<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $sucursales = Sucursal::all();
    return view('sucursales.index', compact('sucursales'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sucursales.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'nombre' => 'required',
        'direccion' => 'required',
        'ciudad' => 'required'
        ]);

        Sucursal::create($request->all());

        return redirect()->route('sucursales.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Sucursal $sucursal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sucursal $sucursal)
    {
        return view('sucursales.edit', ['sucursal' => $sucursal]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Sucursal $sucursal)
{
    $request->validate([
        'nombre' => 'required',
        'direccion' => 'required',
        'ciudad' => 'required'
    ]);

    $sucursal->update($request->all());

    return redirect()->route('sucursales.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sucursal $sucursal)
    {
        $sucursal->delete();

        return redirect()->route('sucursales.index');
    }
}
