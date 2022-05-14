<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tipo_funcionario extends Model
{
    //
    use Notifiable;

    protected $table = 'tipo_funcionario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'tipo_funcionario','status',
    ];
}
