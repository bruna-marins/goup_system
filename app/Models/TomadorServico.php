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
        'sobrenome',
        'cnpj',
        'telefone',
        'site',
        'email',
        'nome_fantasia',
        'data_abertura',
        'inscricao_municipal',
        'cep',
        'logradouro',
        'numero',
        'bairro',
        'cidade',
        'estado',
        'complemento',
        'cnae',
        'capital_social',
        'faturamento_anual',
        'responsavel_contabil',
        'codigo_tributacao',
        'aliquota_fiscais',
        'socio',
        'cpf',
        'participacao_societaria',
        'cargo',
        'natureza_juridica',
        'regime_tributario',
        'numero',
    ];

    /**
     * Get the empresa that owns the tomador de servico.
     */
    public function empresa()
    {
        return $this->belongsTo(Empresa::class);
    }

    public function clientes()
    {
        return $this->hasMany(Cliente::class);
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function socios()
    {
        return $this->belongsToMany(Socio::class, 'socio_tomador');
    }
}

