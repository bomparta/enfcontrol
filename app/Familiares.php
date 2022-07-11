<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Familiares extends Model
{
    //
    use Notifiable;

    protected $table = 'familiares';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'persona_id','funcionario_id','parentezco_id','cargo',
        'ocupacion','telefono','vive_id','status',
    ];


    
}
