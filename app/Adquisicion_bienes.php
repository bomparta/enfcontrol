<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Adquisicion_bienes extends Model
{
    //
    use Notifiable;

    protected $table = 'bienes_nacionales.adquisicion_bienes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','status',
    ];

}
