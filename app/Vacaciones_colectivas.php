<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vacaciones_colectivas extends Model
{
    //

    use Notifiable;

    protected $table = 'vacaciones.vacaciones_colectivas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_oficina_administrativa','id_tipo_funcionario','lapso_disfrute','dias_adescontar','observaciones','registrado_por','actualizado_por','status',

    ];
}
