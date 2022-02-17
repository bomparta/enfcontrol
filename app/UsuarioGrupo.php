<?php

namespace App;

use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\Model;

class UsuarioGrupo extends Model
{
    protected $table = 'usuario_grupo';

	    const CREATED_AT = 'created_at';
        const UPDATED_AT = 'updated_at';

    
    protected $primaryKey = 'id';
    

    protected $fillable = [
        'nombre', 'activos'
    ];

    public function usuario()
    {
        return $this->hasMany(User::class, 'id_usuariogrupo');
    }
}
