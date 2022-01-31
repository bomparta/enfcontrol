<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Actuacion extends Model
{
    use Notifiable;

    protected $table = 'actuacion';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod_actividad','anio', 'cod_actuacion',
    ];
}
