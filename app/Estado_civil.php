<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Estado_civil extends Model
{
    use Notifiable;

    protected $table = 'estado_civil';

	    const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','status',
    ];
}
