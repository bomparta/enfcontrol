<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Participantes extends Model
{
    use Notifiable;

    protected $table = 'actuacion_participantes';

	const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_actuacion','id_persona','id_organismo', 'id_tipo_funcionario', 'id_entidad',
    ];

	
}
