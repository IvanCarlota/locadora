<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nome', 'cpf', 'telefone'];

    public function locacoes() {
        return $this->hasMany(Locacao::class);
    }
}
