<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Avaliacoes extends Model
{
    protected $primaryKey = 'id_avaliacao';
    protected $fillable = ['user_id', 'certificado_id', 'situacao', 'justificativa'];
    protected $table = 'avaliacoes';
}
