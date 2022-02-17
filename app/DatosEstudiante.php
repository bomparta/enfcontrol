<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DatosEstudiante extends Model
{
    use Notifiable;

    protected $table = 'persona';

	    const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'nombre', 'apellido','edad',
    ];
}
