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

	/*function contador($cod){
		$cod_1 = "'".$cod."'";
		$query_count = $this->db->query('SELECT COUNT(id) AS conteo FROM actuacion WHERE cod_actividad = '.$cod_1.' AND status = 1 GROUP BY cod_actividad');
		
		if($query_count->num_rows() > 0){
			foreach($query_count->result() as $row)
			{
				$count = $row->conteo;
				
				return $count;
			}//end foreach
		}else{
			return 0;
		}//aqui comprobamos si hay resultados en $query_count
	
	}//end function count con la cual obtenemos los numeros de actuaciones de cada actividad
	*/	
	
    

}
