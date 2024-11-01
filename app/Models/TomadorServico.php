<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TomadorServico extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tomadores_servicos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empresa_id',
        'nome',
        'cnpj',
        'cpf',
        'email',
        'telefone',
        'site',
        'logradouro',
        'bairro',
        'cidade',
        'estado',
        'cep',
        'status',
    ];

    /**
     * Get the empresa that owns the tomador de servico.
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }
}

