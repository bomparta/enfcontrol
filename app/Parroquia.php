<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Parroquia extends Model
{
    use Notifiable;

    protected $table = 'parroquia';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_municipio','nombre',
    ];
}
