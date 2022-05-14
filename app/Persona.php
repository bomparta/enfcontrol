<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Persona extends Model
{
    //
    use Notifiable;

    protected $table = 'persona';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id', 'nombre','nombreseg','apellido','apellidoseg','id_genero','numero_identificacion','id_nacionalidad','email','telefono_hab','telefono_cel'
    ];
}
