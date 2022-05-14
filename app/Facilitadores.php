<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Facilitadores extends Model
{
    use Notifiable;

    protected $table = 'actuacion_ponentes';

	const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_actuacion','id_persona','id_tratamiento',
    ];

	
}
