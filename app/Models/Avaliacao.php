<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    //
    protected $table = "avaliacoes";
    public $incrementing = true;

    protected $fillable = ['nota', 'comentario', 'estado_equipamento', 'cumprimento_contrato', 'locacao_id', 'locatariodalocacao_id'];

    public function locacao()
    {
        return $this->belongsTo(Locacao::class, "locacao_id", "id");
    }
    public function locatario()
    {
        return $this->belongsTo(User::class, "locatario_id", "id");
    }
}
