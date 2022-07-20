<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Laboral extends Model
{
    //
    use Notifiable;

    protected $table = 'laboral';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcionario_id','nombre_empresa','cargo',
        'fecha_ingreso','fecha_egreso','status',
    ];

}
