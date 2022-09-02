<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Imagen_uploads_mov_rrhh extends Model
{
    //
    use Notifiable;
    const CREATED_AT = 'created_at';
    
    const UPDATED_AT = 'updated_at';    
    
    protected $table = 'imagen_uploads_mov_rrhh';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nombre',
        'ruta',
        'cedula',
        'rrhh_mov_id',
        'registrado_por',
        'status'

    ]; 

}
