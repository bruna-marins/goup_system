<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    // Permite a atribuição em massa dos campos abaixo
    protected $fillable = ['nome', 'cnpj', 'endereco', 'telefone', 'email', 'holding_id'];

    // Relacionamento Muitos-para-Um: Cada Empresa pertence a uma Holding
    public function holding()
    {
        return $this->belongsTo(Holding::class);
    }

    public function contasContabeis()
    {
        return $this->hasMany(ContasContabeis::class);
    }

    public function lancamentosContabeis()
    {
        return $this->hasMany(LancamentosContabeis::class);
    }

    public function balancetes()
    {
        return $this->hasMany(Balancetes::class);
    }
}
