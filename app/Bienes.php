<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bienes extends Model
{
    //
    use Notifiable;

    protected $table = 'bienes_nacionales.bienes';

	    const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'num_bien','num_orden_compra', 'forma_adquisicion_id','tipo_bien_id',
         'marca_id', 'modelo','serial','color','registrado_por'
    ];
}

