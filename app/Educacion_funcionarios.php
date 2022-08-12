<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Educacion_funcionarios extends Model
{
    //
    use Notifiable;

    protected $table = 'educacion_funcionarios';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcionario_id','profesion_ocup','status'
    ];
    

}

