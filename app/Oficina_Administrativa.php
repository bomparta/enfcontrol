<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Oficina_Administrativa extends Model
{
    //
    use Notifiable;

    protected $table = 'oficina_administrativa';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre','status',
    ];

}
