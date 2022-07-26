<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Mov_Bienes extends Model
{
    //
    use Notifiable;

    protected $table = 'bienes_nacionales.mov_bienes';

	    const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bienes_id','tipo_movimiento_id','responsable_asignado','ubic_adm_id','entidad_id','quien_registro','observaciones','status'
    ];
}
