<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransacoesBalancete extends Model
{

    use HasFactory;

    protected $fillable = ['balancete_id', 'conta_id', 'debito', 'credito', 'saldo'];

    public function contaContabil()
    {
        return $this->belongsTo(ContasContabeis::class);
    }

    public function balancete()
    {
        return $this->belongsTo(Balancetes::class);
    }

}
