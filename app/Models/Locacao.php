<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locacao extends Model
{
    protected $fillable = [
        'cliente_id',
        'fita_id',
        'data_locacao',
        'data_devolucao_prevista',
        'status'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }

    public function fita() {
        return $this->belongsTo(Fita::class);
    }
}
