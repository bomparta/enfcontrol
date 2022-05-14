<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Municipio extends Model
{
    use Notifiable;

    protected $table = 'municipio';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_entidad','nombre',
    ];
}
