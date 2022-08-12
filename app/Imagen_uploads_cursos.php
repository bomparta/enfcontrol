<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Imagen_uploads_cursos extends Model
{
    //
    use Notifiable;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';    
    
    protected $table = 'imagen_uploads_cursos';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'nombre',
        'ruta',
        'usuario',
        'cursos_id'
    ]; 
}
