<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Locatario extends Model
{
    protected $table = "locatario";
    public $incrementing = true;
    protected $fillable = ['nome', 'email', 'senha', 'telefone', 'endereco'];
}