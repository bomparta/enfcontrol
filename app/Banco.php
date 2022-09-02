<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Banco extends Model
{
    //
    use Notifiable;

    protected $table = 'banco';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','nombre','nro_cuenta','status',
    ];
}
