<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContasContabeis extends Model
{

    use HasFactory;

    protected $fillable = ['codigo_conta', 'descricao', 'tipo', 'nivel', 'empresa_id'];

    public function lancamentos()
    {
        return $this->hasMany(LancamentosContabeis::class);
    }

    public function trasacoesBalancete()
    {
        return $this->hasMany(LancamentosContabeis::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
