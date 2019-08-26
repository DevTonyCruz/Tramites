<?php

namespace App\Exports;

use App\Models\Tramites;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class TramitesExport implements FromQuery
{

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        $dates = [
            "fecha_ini" => $this->data['fecha_ini'],
            "fecha_fin" => $this->data['fecha_fin'],
        ];

        $record = Tramites::dates($dates)->status($this->data['status']);
        if($this->data['status'] == 'E' || $this->data['status'] == 'T'){

            $entramiteNull = Tramites::whereNull('fecha_fin')->where('status', 1);

            $record = $record->union($entramiteNull)->orderBy('id');
        }

        return $record;
    }
}
