<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{
    protected $fillable = ['url', 'nome_certificado', 'tipo', 'inicio', 'termino', 'carga_horaria',
                            'total_horas_complementares', 'minimo_horas_complementares'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'certificados';
}