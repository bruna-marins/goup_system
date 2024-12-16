<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'nome_fantasia',
        'razao_social',
        'email',
        'telefone',
        'cnpj',
        'cpf',
        'sobrenome',
        'site',
        'tomador_servico_id',
    ];

    public function tomadorServico()
    {
        return $this->belongsTo(TomadorServico::class);
    }
}
