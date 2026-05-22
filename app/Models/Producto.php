<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock_critico',
        'imagen',
    ];
    
    public function movimientos()
    {
        return $this->hasMany(MovimientoInventario::class);
    }

    public function getStockActualAttribute()
    {
        $entradas = $this->movimientos()->where('tipo', 'entrada')->sum('cantidad');
        $salidas = $this->movimientos()->where('tipo', 'salida')->sum('cantidad');

        return $entradas - $salidas;
    }
}