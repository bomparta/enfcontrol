<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Actuacion extends Model
{
    use Notifiable;

    protected $table = 'actuacion';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cod_actividad','anio', 'cod_actuacion',
    ];
/*
    function contador($cod){
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
