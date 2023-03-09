<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Vacaciones_disfrutadas extends Model
{
    //
    use Notifiable;

    protected $table = 'vacaciones.vacaciones_disfrutadas';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcionario_id','solicitud_vacaciones_id','lapso_disfrute','dias_disfrutados','dias_completos','status',
    ];
}
