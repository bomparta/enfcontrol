<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Solicitud_vacaciones extends Model
{
    //
    use Notifiable;

    protected $table = 'vacaciones.solicitud_vacaciones';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcionario_id','fecha_solicitud','fecha_inicio','fecha_fin','fecha_reintegro','status',

    ];
}
