<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Funcionario extends Model
{
    //
    use Notifiable;

    protected $table = 'funcionario';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'persona_id','id_tipo_funcionario','id_oficina_administrativa','cargo',
        'grupo_sanguineo','es_alergico','tipo_alergia','estatura','peso',
        'pantalon','camisa','calzado','estado_domicilio','municipio_domicilio',
        'parroquia_domicilio','codigo_postal','sector_urbanizacion',
        'calle_avenida','nro_casa_apartamento','piso_nro_casa',
        'nombre_casa_edificio_residencia','condicion_casa_id',
        'profesion','ocupacion','estudia','status',
    ];
}
