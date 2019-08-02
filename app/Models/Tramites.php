<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tramites extends Model
{
    protected $fillable = ['foto'];

    public function gestion()
    {
        return $this->hasOne('App\Models\Gestion', 'id', 'gestion_id');
    }

    public function remitente()
    {
        return $this->hasOne('App\Models\Remitente', 'id', 'remitente_id');
    }

    public function sepomex()
    {
        return $this->hasOne('App\Models\Sepomex', 'id', 'sepomex_id');
    }

    public function createdby()
    {
        return $this->hasOne('App\Models\Tramites', 'id', 'created_by');
    }

    public function updatedby()
    {
        return $this->hasOne('App\Models\Tramites', 'id', 'updated_by');
    }

    public function scopeDates($query, $dates)
    {
        $query->where('fecha_ini', '>=', $dates['fecha_ini'])->
                where('fecha_fin', '<=', $dates['fecha_fin']);
    }

    public function scopeStatus($query, $status)
    {
        switch($status){
            case 'E':
            $query->where(DB::raw('DATEDIFF(fecha_fin, CURDATE())'), '>', 3)
                    ->where('status', 1);
            break;
            case 'C':
                $query->where('status', 0);
            break;
            case 'P':
                $query->where(DB::raw('DATEDIFF(fecha_fin, CURDATE())'), '<=', 3)
                        ->where(DB::raw('DATEDIFF(fecha_fin, CURDATE())'), '>', 0)
                        ->where('status', 1);
            break;
            case 'V':
                $query->where(DB::raw('DATEDIFF(fecha_fin, CURDATE())'), '<=', 0)
                        ->where('status', 1);
            break;
            default:
            break;
        }
    }
}
