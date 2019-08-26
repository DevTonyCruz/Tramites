<?php

namespace App\Exports;

use App\Models\Directorio;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class DirectorioProfesionesExport implements FromQuery, WithMapping, WithHeadings, WithEvents, WithColumnFormatting
{
    protected $profesion_id;

    public function __construct($profesion_id)
    {
        $this->profesion_id = $profesion_id;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function query()
    {
        if($this->profesion_id <= 0){
            $directorio = Directorio::query();
        }else{
            $directorio = Directorio::where('id_profesion', $this->profesion_id);
        }

        return $directorio;
    } 
    
    
    public function map($directorio): array
    {
        $estado = '';
        $ciudad = '';
        $colonia = '';
        $cp = '';
        if(!is_null($directorio->sepomex_id)){
            $estado = $directorio->sepomex->state;
            $ciudad = $directorio->sepomex->location;
            $colonia = $directorio->sepomex->name;
            $cp = $directorio->sepomex->zip_code;
        }

        $estado_politico = '';
        $ciudad_politico = '';
        $colonia_politico = '';
        $cp_politico = '';
        if(!is_null($directorio->sepomex_id_politico)){
            $estado_politico = $directorio->sepomex_politico->state;
            $ciudad_politico = $directorio->sepomex_politico->location;
            $colonia_politico = $directorio->sepomex_politico->name;
            $cp_politico = $directorio->sepomex_politico->zip_code;
        }

        $grupo = '';
        if(!is_null($directorio->id_grupos)){
            if(!is_null($directorio->grupos)){
                $grupo = $directorio->grupos->nombre;
            }
        }

        $profesion = '';
        if(!is_null($directorio->id_profesion)){
            if(!is_null($directorio->profesion)){
                $profesion = $directorio->profesion->nombre;
            }
        }

        return [
            $directorio->nombre,
            $directorio->appaterno,
            (is_null($directorio->apmaterno)) ? '' : $directorio->apmaterno,
            $directorio->direccion,
            (is_null($directorio->interior)) ? '' : $directorio->interior,
            $directorio->exterior,
            $colonia,
            $ciudad,
            $estado,
            $cp,
            (is_null($directorio->telefono)) ? '' : $directorio->telefono,
            (is_null($directorio->email)) ? '' : $directorio->email,
            
            (is_null($directorio->facebook)) ? '' : $directorio->facebook,
            (is_null($directorio->instagram)) ? '' : $directorio->instagram,
            (is_null($directorio->twitter)) ? '' : $directorio->twitter,
            
            $grupo,
            $profesion,

            (is_null($directorio->fecha_contacto)) ? '' : substr($directorio->fecha_contacto, 0, 10),
            (is_null($directorio->fecha_nacimiento)) ? '' : substr($directorio->fecha_nacimiento, 0, 10),
            (is_null($directorio->fecha_importante)) ? '' : substr($directorio->fecha_importante, 0, 10),
            $directorio->concepto_fecha_importante,

            $directorio->observaciones,
            $directorio->distrito,
            $directorio->demarcacion,
            $directorio->seccional,
            
            $directorio->coordinador_zona,
            $directorio->coordinador_demarcacion,
            $directorio->distrito_politico,
            $directorio->demarcacion_politico,
            $directorio->seccional_politico,
            $estado_politico,
            $ciudad_politico,
            $colonia_politico,
            $cp_politico 
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
            'correo electrónico',
            'Facebook',
            'Instagram',
            'Twitter',
            'Grupo',
            'Profesión',
            'Fecha de contacto',
            'Fecha de nacimiento',
            'Fecha importante',
            'Concepto de la fecha importante',
            'Observaciones',
            'Distrito',
            'Demarcación',
            'Seccional',
            'Coordinador de zona',
            'Coordinador de demarcación',
            'Distrito político',
            'Demarcación política',
            'Seccional político',
            'Colonia',
            'Ciudad',
            'Estado',
            'Código postal',
        ];
    }
    
    public function columnFormats(): array
    {
        return [
            'R' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'S' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'T' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }

    /**
     * @return array
     */
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
                $event->sheet->getStyle('A1:AH1')->applyFromArray($styleArray);
                
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
                $event->sheet->getColumnDimension('Y')->setAutoSize(true);
                $event->sheet->getColumnDimension('Z')->setAutoSize(true);
                $event->sheet->getColumnDimension('AA')->setAutoSize(true);
                $event->sheet->getColumnDimension('AB')->setAutoSize(true);
                $event->sheet->getColumnDimension('AC')->setAutoSize(true);
                $event->sheet->getColumnDimension('AD')->setAutoSize(true);
                $event->sheet->getColumnDimension('AE')->setAutoSize(true);
                $event->sheet->getColumnDimension('AF')->setAutoSize(true);
                $event->sheet->getColumnDimension('AG')->setAutoSize(true);
                $event->sheet->getColumnDimension('AH')->setAutoSize(true);
            }
        ];
    }
}
