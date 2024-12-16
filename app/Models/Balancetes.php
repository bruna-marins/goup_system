<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balancetes extends Model
{

    use HasFactory;

    protected $fillable = ['data_inicio', 'data_fim', 'saldo_inicial', 'saldo_final', 'empresa_id'];

    public function transacoes()
    {
        return $this->hasMany(TransacoesBalancete::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
