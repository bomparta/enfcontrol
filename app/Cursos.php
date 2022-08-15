<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cursos extends Model
{
    //
    use Notifiable;

    protected $table = 'cursos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcionario_id','nommbre_curso','institucion_curso',
        'dir_ref_curso','fechainicio_curso','fechaculminacion_curso','status',
    ];


 
}

