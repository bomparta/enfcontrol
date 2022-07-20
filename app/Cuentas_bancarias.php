<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Cuentas_bancarias extends Model
{
    //
    use Notifiable;

    protected $table = 'cuentas_bancarias';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'funcionario_id','cuenta','tipo_cuenta',
        'nombre_banco','status',
    ];
}
