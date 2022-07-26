<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Control_Bienes extends Model
{
    //
    use Notifiable;

    protected $table = 'bienes_nacionales.control_bienes';

	    const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'ult_num_bien','anio','nomenclatura','status'
    ];
}



    