<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holding extends Model
{
    use HasFactory;

    // Permite a atribuição em massa dos campos abaixo
    protected $fillable = [
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
