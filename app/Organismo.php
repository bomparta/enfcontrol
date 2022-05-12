<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Organismo extends Model
{
    //
    use Notifiable;

    protected $table = 'organismo';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'organismo','status',
    ];
}
