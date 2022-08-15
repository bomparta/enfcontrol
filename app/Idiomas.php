<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Idiomas extends Model
{
    //
    use Notifiable;

    protected $table = 'idiomas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcionario_id','nommbre_idioma','habla',
        'lee','escribe','status',
    ];
}
