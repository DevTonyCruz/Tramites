<?php

namespace App\Http\Controllers;

use App\Exports\DirectorioGruposExport;
use App\Exports\DirectorioProfesionesExport;
use Illuminate\Http\Request;
use App\Models\Directorio;
use App\Models\Profesiones;
use App\Models\Grupos;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Maatwebsite\Excel\Facades\Excel;

class DirectorioController extends Controller
{
    public function index()
    {
        $directorios = Directorio::get();
        $profesiones = Profesiones::get();
        $grupos = Grupos::get();
        return view('directorio.index', [
            "directorios" => $directorios,
            "profesiones" => $profesiones,
            "grupos" => $grupos
        ]);
    }

    public function list()
    {

        $model = Directorio::with(['profesion', 'grupos']);

        return datatables()->eloquent($model)
            ->addColumn('politico', function (Directorio $directorio) {
                $politico = 'NO';
                if (
                    !is_null($directorio->coordinador_zona) ||
                    !is_null($directorio->coordinador_demarcacion) ||
                    !is_null($directorio->distrito_politico) ||
                    !is_null($directorio->demarcacion_politico) ||
                    !is_null($directorio->seccional_politico)
                ) {
                    $politico = 'SI';
                }

                return $politico;
            })->toJson();
    }

    public function create()
    {
        $profesiones = Profesiones::all();
        $grupos = Grupos::all();
        return view('directorio.create', [
            "profesiones" => $profesiones,
            "grupos" => $grupos,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'appaterno' => 'required',
            'email' => 'email',
            'phone' => 'max:15',
            'direccion' => 'required',
            'exterior' => 'required',
            'sepomex_id' => 'required|numeric',
            'zip_code' => 'required',

            'id_profesion' => 'numeric',
            'id_grupos' => 'numeric',

            'fecha_nacimiento' => 'required',
            'fecha_importante' => 'required',
            'fecha_contacto' => 'required',

            'concepto_fecha_importante' => 'required'
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
            'appaterno.required' => 'El campo apellido paterno es requerido',
            'direccion.required' => 'El campo calle es requerido',
            'exterior.required' => 'El campo número exterior es requerido',
            'email.email' => 'El campo email no es válido',
            'phone.max' => 'El campo teléfono debe de contener como máximo 10 digitos',
            'sepomex_id.required' => 'El código postal es requerido',
            'sepomex_id.numeric' => 'El código postal no es válido',
            'zip_code.required' => 'Debe seleccionar una colonia',

            'id_profesion.required' => 'El campo profesion es requerido',
            'id_profesion.numeric' => 'Debe seleccionar una profesión',
            'id_grupos.required' => 'El campo grupos es requerido',
            'id_grupos.numeric' => 'Debe seleccionar un grupo',

            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es requerido',
            'fecha_importante.required' => 'El campo fecha importante es requerido',
            'fecha_contacto.required' => 'El campo fecha de contacto es requerido'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $directorio = new Directorio();
            $directorio->nombre = $request->nombre;
            $directorio->appaterno = $request->appaterno;
            $directorio->apmaterno = $request->apmaterno;
            $directorio->direccion = $request->direccion;
            $directorio->interior = $request->interior;
            $directorio->exterior = $request->exterior;
            $directorio->sepomex_id = $request->sepomex_id;
            $directorio->email = $request->email;
            $directorio->telefono = $request->phone;

            $directorio->facebook = $request->facebook;
            $directorio->instagram = $request->instagram;
            $directorio->twitter = $request->twitter;

            $directorio->id_profesion = $request->id_profesion;
            $directorio->id_grupos = $request->id_grupos;

            $directorio->fecha_nacimiento = Carbon::parse($request->fecha_nacimiento)->format('Y-m-d H:i:s');
            $directorio->fecha_importante = Carbon::parse($request->fecha_importante)->format('Y-m-d H:i:s');
            $directorio->fecha_contacto = Carbon::parse($request->fecha_contacto)->format('Y-m-d H:i:s');

            $directorio->concepto_fecha_importante = $request->concepto_fecha_importante;
            $directorio->observaciones = $request->observaciones;

            $directorio->distrito = $request->distrito;
            $directorio->demarcacion = $request->demarcacion;
            $directorio->seccional = $request->seccional;

            $directorio->coordinador_zona = $request->coordinador_zona;
            $directorio->coordinador_demarcacion = $request->coordinador_demarcacion;
            $directorio->distrito_politico = $request->distrito_politico;
            $directorio->demarcacion_politico = $request->demarcacion_politico;
            $directorio->seccional_politico = $request->seccional_politico;
            $directorio->sepomex_id_politico = $request->sepomex_id_politico;

            $directorio->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $directorio->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($directorio->save()) {
                return redirect()->route('directorio.index');
            }

            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
            //return back()->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 200)');
        }
    }

    public function edit($id)
    {
        $directorio = Directorio::where('id', $id)->first();
        $profesiones = Profesiones::all();
        $grupos = Grupos::all();
        return view('directorio.edit', [
            "directorio" => $directorio,
            "profesiones" => $profesiones,
            "grupos" => $grupos,
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nombre' => 'required',
            'appaterno' => 'required',
            'email' => 'email',
            'phone' => 'max:15',
            'direccion' => 'required',
            'exterior' => 'required',
            'sepomex_id' => 'required|numeric',
            'zip_code' => 'required',

            'id_profesion' => 'numeric',
            'id_grupos' => 'numeric',

            'fecha_nacimiento' => 'required',
            'fecha_importante' => 'required',
            'fecha_contacto' => 'required',

            'concepto_fecha_importante' => 'required'
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
            'appaterno.required' => 'El campo apellido paterno es requerido',
            'direccion.required' => 'El campo calle es requerido',
            'exterior.required' => 'El campo número exterior es requerido',
            'email.email' => 'El campo email no es válido',
            'phone.max' => 'El campo teléfono debe de contener como máximo 10 digitos',
            'sepomex_id.required' => 'El código postal es requerido',
            'sepomex_id.numeric' => 'El código postal no es válido',
            'zip_code.required' => 'Debe seleccionar una colonia',

            'id_profesion.required' => 'El campo profesion es requerido',
            'id_profesion.numeric' => 'Debe seleccionar una profesión',
            'id_grupos.required' => 'El campo grupos es requerido',
            'id_grupos.numeric' => 'Debe seleccionar un grupo',

            'fecha_nacimiento.required' => 'El campo fecha de nacimiento es requerido',
            'fecha_importante.required' => 'El campo fecha importante es requerido',
            'fecha_contacto.required' => 'El campo fecha de contacto es requerido'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $directorio = Directorio::where('id', $id)->first();
            $directorio->nombre = $request->nombre;
            $directorio->appaterno = $request->appaterno;
            $directorio->apmaterno = $request->apmaterno;
            $directorio->direccion = $request->direccion;
            $directorio->interior = $request->interior;
            $directorio->exterior = $request->exterior;
            $directorio->sepomex_id = $request->sepomex_id;
            $directorio->email = $request->email;
            $directorio->telefono = $request->phone;

            $directorio->facebook = $request->facebook;
            $directorio->instagram = $request->instagram;
            $directorio->twitter = $request->twitter;

            $directorio->id_profesion = $request->id_profesion;
            $directorio->id_grupos = $request->id_grupos;

            $directorio->fecha_nacimiento = Carbon::parse($request->fecha_nacimiento)->format('Y-m-d H:i:s');
            $directorio->fecha_importante = Carbon::parse($request->fecha_importante)->format('Y-m-d H:i:s');
            $directorio->fecha_contacto = Carbon::parse($request->fecha_contacto)->format('Y-m-d H:i:s');

            $directorio->concepto_fecha_importante = $request->concepto_fecha_importante;
            $directorio->observaciones = $request->observaciones;

            $directorio->distrito = $request->distrito;
            $directorio->demarcacion = $request->demarcacion;
            $directorio->seccional = $request->seccional;

            $directorio->coordinador_zona = $request->coordinador_zona;
            $directorio->coordinador_demarcacion = $request->coordinador_demarcacion;
            $directorio->distrito_politico = $request->distrito_politico;
            $directorio->demarcacion_politico = $request->demarcacion_politico;
            $directorio->seccional_politico = $request->seccional_politico;
            $directorio->sepomex_id_politico = $request->sepomex_id_politico;

            $directorio->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $directorio->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($directorio->save()) {
                return redirect()->route('directorio.index');
            }

            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
            //return back()->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 200)');
        }
    }

    public function destroy($id)
    {
        $directorio = Directorio::where('id', $id)->first();

        if ($directorio->delete()) {

            return redirect()->route('directorio.index');
        }

        return back()
            ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
    }

    public function exportGrupos(Request $request)
    {
        $rules = [
            'grupo_id' => 'required|numeric',
        ];

        $messages = [
            'grupo_id.required' => 'El campo grupo es requerido',
            'grupo_id.numeric' => 'Debe seleccionar un grupo',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        return Excel::download(new DirectorioGruposExport($request->grupo_id), 'directorio-por-grupos.xlsx');
    }

    public function exportProfesiones(Request $request)
    {
        $rules = [
            'profesion_id' => 'required|numeric',
        ];

        $messages = [
            'profesion_id.required' => 'El campo profesión es requerido',
            'profesion_id.numeric' => 'Debe seleccionar una profesión',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        return Excel::download(new DirectorioProfesionesExport($request->profesion_id), 'directorio-por-profesiones.xlsx');
    }
    
    public function alertas()
    {
        $directorios = Directorio::get();

        $fechas = [];
        foreach($directorios as $directorio){
            //fecha contacto
            $fecha_contacto = Carbon::parse($directorio->fecha_contacto);
            $fecha_nacimiento = Carbon::parse($directorio->fecha_nacimiento);
            $fecha_importante = Carbon::parse($directorio->fecha_importante);
            
            $date = Carbon::now();            
            $anio = $date->format('Y');
            $fecha_profesion = Carbon::parse($directorio->profesion->dia . '-' . $directorio->profesion->mes . '-' . $anio);

            $fecha_contacto = $this->next_dates($fecha_contacto);
            $fecha_nacimiento = $this->next_dates($fecha_nacimiento);
            $fecha_importante = $this->next_dates($fecha_importante);
            $fecha_profesion = $this->next_dates($fecha_profesion);

            if(($fecha_contacto !== false) || ($fecha_nacimiento !== false) || ($fecha_importante !== false) || ($fecha_profesion !== false)){
            
                $datos = [
                    "nombre" => $directorio->fullName(),
                    "fechas" => [
                        "contacto" => $fecha_contacto,
                        "cumpleanios" => $fecha_nacimiento,
                        "importante" => $fecha_importante,
                        "feriado" => $fecha_profesion
                    ]
                ];
    
                array_push($fechas, $datos);
            }
        }

        return view('directorio.alertas', [
            "fechas" => $fechas
        ]);
    }

    public function next_dates($date){
        $fecha_hoy = Carbon::now();
        
        $fecha = explode('-', substr($date, 0, 10));
        $dia = $fecha[2];
        $mes = $fecha[1];         
        $anio = $fecha_hoy->format('Y');
        $date = Carbon::parse($dia . '-' . $mes . '-' . $anio);
        
        $diferencia_dias = $fecha_hoy->diffInDays($date, false);
        if($diferencia_dias > 0 && $diferencia_dias <= 15){

            return Carbon::parse($date)->format('d-m-Y');
        }

        return false;
    }
}
