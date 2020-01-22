<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{
    protected $primaryKey = 'id_certificado';
    protected $fillable = ['path_certificado', 'nome_certificado', 'tipo', 'inicio', 'termino', 'carga_horaria',
                            'total_horas_complementares', 'minimo_horas_complementares'];
    protected $guarded = ['id_certificado', 'created_at', 'update_at'];
    protected $table = 'certificados';
}