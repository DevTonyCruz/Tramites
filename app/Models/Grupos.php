<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupos extends Model
{

    public function directorio()
    {
        return $this->hasOne('App\Models\Directorio', 'id_grupos', 'id');
    }
}
