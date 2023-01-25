<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Estado_bienes extends Model
{
    //
    use Notifiable;

    protected $table = 'bienes_nacionales.estado_bienes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','status',
    ];
}
