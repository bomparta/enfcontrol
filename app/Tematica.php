<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tematica extends Model
{
    use Notifiable;

    protected $table = 'tematica';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'descripcion','sttus',
    ];
}
