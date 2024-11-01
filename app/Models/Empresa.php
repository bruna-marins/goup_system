<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    // Permite a atribuição em massa dos campos abaixo
    protected $fillable = [
        'holding_id',
        'nome',
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
    ];


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

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function tomadoresServicos()
    {
        return $this->hasMany(TomadorServico::class);
    }
}
