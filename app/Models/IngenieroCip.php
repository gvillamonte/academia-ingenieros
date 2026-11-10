<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IngenieroCip extends Model
{
    protected $table = 'ingenieros_cip';

    protected $fillable = [
        'cip',
        'nombre',
        'especialidad',
        'sede',
        'habilitado',
        'deuda',
    ];

    protected function casts(): array
    {
        return [
            'habilitado' => 'boolean',
            'deuda' => 'decimal:2',
        ];
    }
}
