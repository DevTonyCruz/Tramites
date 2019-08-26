<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profesiones extends Model
{

    public function getFechaAttribute() {
        $dia = str_pad($this->dia, 2, "0", STR_PAD_LEFT);
        $mes = str_pad($this->mes, 2, "0", STR_PAD_LEFT);
        $anio = date("Y");

        $fecha = $dia . '-' . $mes . '-' . $anio;
        return $fecha;
    }

    public function getFechaMesAttribute() {

        $mes = '';
        switch($this->mes){
            case 1: $mes = 'Enero'; break;
            case 2: $mes = 'Febrero'; break;
            case 3: $mes = 'Marzo'; break;
            case 4: $mes = 'Abril'; break;
            case 5: $mes = 'Mayo'; break;
            case 6: $mes = 'Junio'; break;
            case 7: $mes = 'Julio'; break;
            case 8: $mes = 'Agosto'; break;
            case 9: $mes = 'Septiembre'; break;
            case 10: $mes = 'Octubre'; break;
            case 11: $mes = 'Noviembre'; break;
            case 12: $mes = 'diciembre'; break;
            default: $mes = 'Sin mes';  break;
        }

        $fecha = $this->dia . ' de ' . $mes;
        return $fecha;
    }
}
