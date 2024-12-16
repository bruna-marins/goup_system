<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LancamentosContabeis extends Model
{

    use HasFactory;

    protected $fillable = ['data', 'valor', 'tipo', 'conta_id', 'empresa_id', 'descricao'];

    public function contaContabil()
    {
        return $this->belongsTo(ContasContabeis::class);
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}
