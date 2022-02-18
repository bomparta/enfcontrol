<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cod_Habitacion extends Model
{
    use Notifiable;

    protected $table = 'codigo_hab';

	    const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion',
    ];
}
