<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Marca extends Model
{
    //
    use Notifiable;

    protected $table = 'bienes_nacionales.marca';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','status',
    ];
}
