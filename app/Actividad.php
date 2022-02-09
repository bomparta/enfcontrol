<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actividad extends Model
{
    use Notifiable;

    protected $table = 'actividad';

	const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'codigo','anio', 'nombre', 'clasificacion','tematica','alcance', 'tipo_actividad',
    ];

	public function grupoactuacion()
    {
        return $this->belongsTo(Actuacion::class, 'cod_actividad');
    }

  

}
