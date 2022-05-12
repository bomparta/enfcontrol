<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class DatosEstudiante extends Model
{
    use Notifiable;

    protected $table = 'estudiante';

	    const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_usuario','primernombre', 'segundonombre','primerapellido',
         'segundoapellido', 'nacionalidad','cedula',
         'genero', 'estadocivil','correo',
         'codtele', 'telfhabitacion','fechanac',
         'codtelecel', 'telefonoCel','cod_what',
         'telfwhatsapp',
    ];
}
