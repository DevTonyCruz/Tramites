<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Registro extends Model
{
    protected $table = 'nominal';
    public $timestamps = false;

    public function estado()
    {
        return $this->hasOne('App\Models\Sepomex', 'state_cod', 'entidad');
    }

    public function municipio_s()
    {
        return $this->hasOne('App\Models\Sepomex', 'locations_cod', 'municipio')->where('state_cod', $this->entidad);
    }

    /*public function scopeName($query, $name)
    {
        $name = trim($name);
        return $query->where(DB::raw('concat(nombre," ",apellido_paterno," ",apellido_materno)') , 'LIKE' , '%' . $name . '%')->get();
        return $query->where(function ($q) use ($name) {
            $q->where('nombre', 'LIKE', '%' . $name . '%')
                ->orWhere('apellido_paterno', 'LIKE', '%' . $name . '%')
                ->orWhere('apellido_materno', 'LIKE', '%' . $name . '%');
        });
    }*/

    public function scopeName($query, $name)
    {
        $name = trim($name);
        return $query->where('nombre', 'LIKE', '%' . $name . '%');
    }

    public function scopeAppat($query, $appat)
    {
        $appat = trim($appat);
        return $query->where('apellido_paterno', 'LIKE', '%' . $appat . '%');
    }

    public function scopeApmat($query, $apmat)
    {
        $apmat = trim($apmat);
        return $query->where('apellido_materno', 'LIKE', '%' . $apmat . '%');
    }

    public function scopeColonia($query, $colony)
    {
        $colony = trim($colony);
        return $query->where('colonia', 'LIKE', '%' . $colony . '%');
    }

    public function scopeDistrito($query, $distrito)
    {
        $distrito = trim($distrito);
        return $query->where('distrito', 'LIKE', '%' . $distrito . '%');
    }

    public function scopeSeccion($query, $seccion)
    {
        $seccion = trim($seccion);
        return $query->where('seccion', 'LIKE', '%' . $seccion . '%');
    }
}
