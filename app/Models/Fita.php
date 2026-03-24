<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fita extends Model
{
    use HasFactory;

    // Lista de campos permitidos para cadastro em massa
    protected $fillable = [
        'titulo',
        'genero',
        'quantidade_disponivel',
        'preco_locacao'
    ];

    /**
     * RELACIONAMENTO: Uma fita pode estar presente em muitas locações.
     * Isso permite que usemos $fita->locacoes para ver o histórico.
     */
    public function locacoes()
    {
        return $this->hasMany(Locacao::class, 'fita_id');
    }
}
