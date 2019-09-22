<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Validator;

class RegistrosController extends Controller
{
    public function index()
    {
        $registro = Registro::get();
        return view('registros.index', [
            "registros" => $registro,
        ]);
    }
    
    public function edit($id)
    {
        $registro = Registro::where('id', $id)->first();
        return view('registros.edit', [
            "registro" => $registro
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nombre' => 'required',
            'apellido_paterno' => 'apellido_paterno',
            'apellido_materno' => 'apellido_materno',

            'distrito' => 'required',
            'seccion' => 'required',
        ];
        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
            'apellido_paterno.required' => 'El campo apellido paterno es requerido',
            'apellido_materno.required' => 'El campo apellido materno es requerido',

            'distrito.required' => 'El campo distrito es requerido',
            'seccion.required' => 'El campo sección es requerido',
        ];
        
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }
        try {
            $directorio = Registro::where('id', $id)->first();
            $directorio->nombre = $request->nombre;
            $directorio->apellido_paterno = $request->apellido_paterno;
            $directorio->apellido_materno = $request->apellido_materno;
            $directorio->sexo = $request->sexo;
            $directorio->clave = $request->clave;
            $directorio->email = $request->email;
            $directorio->telefono = $request->phone;
            //mdY

            if(!is_null($request->fecha_nacimiento)){
                /*$fecha = explode('/', $request->fecha_nacimiento);
                $fecha = $fecha[2].$fecha[1].$fecha[2];*/
                dd(Carbon::parse($request->fecha_nacimiento)->format('Ymd'));
                $directorio->fecha_nacimiento = Carbon::parse($request->fecha_nacimiento)->format('Ymd');
            }

            $directorio->direccion = $request->direccion;
            $directorio->interior = $request->interior;
            $directorio->exterior = $request->exterior;
            $directorio->sepomex_id = $request->sepomex_id;
            $directorio->hobbie = $request->hobbie;
            $directorio->trabajo = $request->trabajo;
            $directorio->facebook = $request->facebook;
            $directorio->instagram = $request->instagram;
            $directorio->twitter = $request->twitter;
            $directorio->id_profesion = $request->id_profesion;
            $directorio->id_grupos = $request->id_grupos;
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
}
