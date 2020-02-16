<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Certificados extends Model
{
    protected $primaryKey = 'id_certificado';
    protected $fillable = ['path_certificado', 'nome_certificado', 'tipo', 'inicio', 'termino', 'carga_horaria',
                            'total_horas_complementares', 'minimo_horas_complementares', 'user_id', 'created_at'];

    protected $table = 'certificados';

    public function getInicioAttribute($value)
    {
        return date('d/m/Y', strtotime($this->attributes['inicio']));
    }

    public function getTerminoAttribute($value)
    {
        return date('d/m/Y', strtotime($this->attributes['termino']));
    }

    public function getCreated_atAttribute($value)
    {
        return date('d/m/Y', strtotime($this->attributes['created_at']));
    }

}
