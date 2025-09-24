<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locador extends Model
{
    protected $table = "locadores";
    public $incrementing = true;

    protected $fillable = ['nome', 'email', 'senha', 'telefone', 'endereco', 'cnpj_cpf', 'documentos', 'reputacao'];

}