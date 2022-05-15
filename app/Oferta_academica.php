<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Oferta_academica extends Model
{
    use Notifiable;

    protected $table = 'oferta_academica';

	    const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fecha_inicio','fecha_fin','id_periodo', 'id_programa', 'id_pensum', 
        'codigo', 'trimestre', 'id_dia_clase', 'id_docente', 'horario', 'unidades_creditos', 
        'seccion', 'cupos', 'valorpubgen', 'monto_total_gen', 'valorpubmp', 'monto_total_mp', 
        'status', 'cupos_ocupados'
    ];
}
