<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holding extends Model
{
    use HasFactory;

    // Permite a atribuição em massa dos campos abaixo
    protected $fillable = ['nome', 'cnpj', 'endereco', 'telefone', 'email'];

    // Relacionamento Um-para-Muitos: Uma Holding pode ter várias Empresas
    public function empresas()
    {
        return $this->hasMany(Empresa::class);
    }

    public function usuarios()
    {
        return $this->hasMany(HoldingUser::class);
    }
}
