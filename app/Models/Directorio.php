<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    protected $table = 'directorio';

    public function profesion()
    {
        return $this->hasOne('App\Models\Profesiones', 'id', 'id_profesion');
    }

    public function grupos()
    {
        return $this->hasOne('App\Models\Grupos', 'id', 'id_grupos');
    }

    public function sepomex()
    {
        return $this->hasOne('App\Models\Sepomex', 'id', 'sepomex_id');
    }

    public function sepomex_politico()
    {
        return $this->hasOne('App\Models\Sepomex', 'id', 'sepomex_id_politico');
    }

    public function relacion_directorios(){        
        return $this->hasMany('App\Models\Relation_events_directory', 'id_directorio', 'id');
    }

    public function fullName()
    {
        $nombre = $this->nombre . ' ' . $this->appaterno . ' ' . $this->apmaterno;
        
        return $nombre;
    }
}
