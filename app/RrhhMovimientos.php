<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class RrhhMovimientos extends Model
{
    //
    use Notifiable;

    protected $table = 'rrhh_movimientos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_tipo_funcionario','cedula','id_oficina_administrativa','cargo','fechamov','id_tipo_mov','institucion','status',
    ];
}
