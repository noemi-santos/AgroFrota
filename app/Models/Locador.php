<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locador extends Model
{
    protected $table = "locador";
    public $incrementing = true;
    protected $fillable = [
    'nome',
    'email',
    'senha',
    'telefone',
    'endereco',
    'cnpj_cpf',
    'documentos_validados',
    'reputacao_media'
];

public function getDocumentosValidadosTextoAttribute()
    {
        return $this->documentos_validados ? "Sim" : "Não";
    }
}
