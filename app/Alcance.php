<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Alcance extends Model
{
    use Notifiable;

    protected $table = 'alcance';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','sttus',
    ];
}
