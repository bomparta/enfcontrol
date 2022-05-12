<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tip_ind_financiero extends Model
{
    //
     //
     use Notifiable;

     protected $table = 'tipo_ind_financiero';
     /**
      * The attributes that are mass assignable.
      *
      * @var array
      */
     protected $fillable = [
         'id_ind_financiero','descripcion','status',
     ];
}
