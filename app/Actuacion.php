<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Actuacion extends Model
{
    use Notifiable;

    protected $table = 'actuacion';

	const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'cod_actividad','anio', 'cod_actuacion',
    ];

	

}
