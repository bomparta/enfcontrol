<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Direccion extends Model
{
    use Notifiable;

    protected $table = 'direccion';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'id_usuario', 'id_estado','id_municipio','id_parroquia','ciudad_urbanismo','calle_avenida','casa_edificio','pto_referencia'
    ];
}
