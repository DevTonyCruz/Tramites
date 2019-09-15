<?php

namespace App\Exports;

use App\Models\Tramites;
use Carbon\Carbon;
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
        if($this->data['sin_fecha'] == 0){
            $dates = [
                "fecha_ini" => $this->data['fecha_ini'],
                "fecha_fin" => $this->data['fecha_fin'],
            ];
    
            $tramites = Tramites::dates($dates)->status($this->data['status']);
            if($this->data['status'] == 'E' || $this->data['status'] == 'T'){
    
                $entramiteNull = Tramites::whereNull('fecha_fin')->where('status', 1);
    
                $tramites = $tramites->union($entramiteNull)->orderBy('id');
            }
        }else{
    
            $tramites = Tramites::status($this->data['status']);
            if($this->data['status'] == 'E' || $this->data['status'] == 'T'){
    
                $entramiteNull = Tramites::whereNull('fecha_fin')->where('status', 1);
    
                $tramites = $tramites->union($entramiteNull)->orderBy('id');
            }
        }

        return $tramites;
    }
    
    public function map($tramites): array
    {
        $estado = '';
        $ciudad = '';
        $colonia = '';
        $cp = '';
        if(!is_null($tramites->sepomex_id)){
            $estado = $tramites->sepomex->state;
            $ciudad = $tramites->sepomex->location;
            $colonia = $tramites->sepomex->name;
            $cp = $tramites->sepomex->zip_code;
        }

        $remitente = '';
        if(!is_null($tramites->gestion_id)){
            if(!is_null($tramites->remitente)){
                $grupo = $tramites->remitente->nombre;
            }
        }

        $gestion = '';
        if(!is_null($tramites->gestion_id)){
            if(!is_null($tramites->gestion)){
                $gestion = $tramites->gestion->nombre;
            }
        }
        
        $estatus = '';
        if (is_null($tramites->fecha_fin)) {
            if ($tramites->status == 1) {
                $estatus = 'Activo';
            }
            if ($tramites->status == 0) {
                $estatus = 'Cerrado';
            }
        } else {
            $fecha_final = Carbon::parse($tramites->fecha_fin);
            $fecha_hoy = Carbon::now();
            $diff = $fecha_hoy->diffInDays($fecha_final, false) + 1;

            if ($tramites->status == 1) {
                if ($diff > 3) {
                    $estatus = 'Activo';
                }

                if ($diff <= 3 && $diff > 0) {
                    $estatus = 'Por vencer';
                }

                if ($diff <= 0) {
                    $estatus = 'Vencido';
                }
            } else {
                $estatus = 'Cerrado';
            }
        }

        return [
            $tramites->nombre,
            $tramites->appaterno,
            (is_null($tramites->apmaterno)) ? '' : $tramites->apmaterno,
            $tramites->direccion,
            (is_null($tramites->interior)) ? '' : $tramites->interior,
            $tramites->exterior,
            $colonia,
            $ciudad,
            $estado,
            $cp,
            (is_null($tramites->telefono)) ? '' : $tramites->telefono,
            (is_null($tramites->email)) ? '' : $tramites->email,

            $remitente,
            $gestion,

            $tramites->seccional,
            $tramites->demarcacion,
            $tramites->distrito,
            $tramites->simpatizante,
            
            $tramites->cantidad,
            $tramites->ife,
            $tramites->observaciones,
            $tramites->fecha_ini,
            $tramites->fecha_fin,
            $estatus
        ];
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido Paterno',
            'Apellido Materno',
            'Calle',
            'Número interior',
            'Número exterior',
            'Colonia',
            'Ciudad',
            'Estado',
            'Código postal',
            'Teléfono',
            'Correo electrónico',
            'Remitente',
            'Gestion',
            'Seccional',
            'Demarcación',
            'Distrito',
            'Simpatizante',
            'Cantidad',
            'IFE',
            'Observaciones',
            'Fecha inicial',
            'Fecha final',
            'Estatus',
        ];
    }
    
    public function columnFormats(): array
    {
        return [
            'V' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'W' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
    
    public function registerEvents(): array
    {
        $styleArray = [
            'font' => [
                'bold' => true,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FFA0A0A0',
                ],
                'endColor' => [
                    'argb' => 'FFFFFFFF',
                ],
            ],
        ];
        
        return [
            // Handle by a closure.
            AfterSheet::class => function(AfterSheet $event) use ($styleArray) {
                $event->sheet->getStyle('A1:X1')->applyFromArray($styleArray);
                
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(true);
                $event->sheet->getColumnDimension('G')->setAutoSize(true);
                $event->sheet->getColumnDimension('H')->setAutoSize(true);
                $event->sheet->getColumnDimension('I')->setAutoSize(true);
                $event->sheet->getColumnDimension('J')->setAutoSize(true);
                $event->sheet->getColumnDimension('K')->setAutoSize(true);
                $event->sheet->getColumnDimension('L')->setAutoSize(true);
                $event->sheet->getColumnDimension('M')->setAutoSize(true);
                $event->sheet->getColumnDimension('N')->setAutoSize(true);
                $event->sheet->getColumnDimension('O')->setAutoSize(true);
                $event->sheet->getColumnDimension('P')->setAutoSize(true);
                $event->sheet->getColumnDimension('Q')->setAutoSize(true);
                $event->sheet->getColumnDimension('R')->setAutoSize(true);
                $event->sheet->getColumnDimension('S')->setAutoSize(true);
                $event->sheet->getColumnDimension('T')->setAutoSize(true);
                $event->sheet->getColumnDimension('U')->setAutoSize(true);
                $event->sheet->getColumnDimension('V')->setAutoSize(true);
                $event->sheet->getColumnDimension('W')->setAutoSize(true);
                $event->sheet->getColumnDimension('X')->setAutoSize(true);
            }
        ];
    }
}
