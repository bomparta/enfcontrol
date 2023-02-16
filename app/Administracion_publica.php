<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Administracion_publica extends Model
{
    //
    use Notifiable;

    protected $table = 'administracion_publica';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcionario_id','organismo','ult_cargo','id_tipo_funcionario','fecha_ingreso','fecha_egreso','anno_servicios','meses_servicios','dias_servicios',
        'observaciones','nombre_documento', 'ruta','status',

    ];
}
