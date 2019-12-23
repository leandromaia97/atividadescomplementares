<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{
    protected $fillable = ['arquivo', 'nome_aluno', 'nome_certificado', 'tipo', 'inicio', 'termino', 'carga_horaria', 'status',
                            'total_horas_complementares', 'minimo_horas_complementares'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'certificados';
}