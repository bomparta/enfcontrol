<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vacaciones_pendientes extends Model
{
    //
    use Notifiable;

    protected $table = 'vacaciones.vacaciones_pendientes';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcionario_id','lapso_disfrute','dias_adisfrutar','status',

    ];
}
