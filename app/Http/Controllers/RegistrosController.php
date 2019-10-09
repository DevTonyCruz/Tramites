<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use App\Models\Sepomex;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegistrosController extends Controller
{
    public function index(Request $request)
    {
        $registro = Registro::with('estado', 'municipio_s');
        $search = false;
        if($request->has('nombre_filtro')){
            $search = true;
            $registro->name($request->nombre_filtro);
        }
        if($request->has('appat_filtro')){
            $search = true;
            $registro->appat($request->appat_filtro);
        }
        if($request->has('apmat_filtro')){
            $search = true;
            $registro->apmat($request->apmat_filtro);
        }
        if($request->has('colonia_filtro')){
            $search = true;
            $registro->colonia($request->colonia_filtro);
        }
        if($request->has('distrito_filtro')){
            $search = true;
            $registro->distrito($request->distrito_filtro);
        }
        if($request->has('seccion_filtro')){
            $search = true;
            $registro->seccion($request->seccion_filtro);
        }

        if($search){
            $registro = $registro->limit(1000)->get();
        }else{
            $registro = $registro->where('id', 0)->get();
        }

        return view('registros.index', [
            "registros" => $registro,
        ]);
    }

    public function list()
    {
        return datatables()->eloquent(Registro::query())->toJson();
    }
    
    public function create(){
        return view('registros.create');
    }

    public function store(Request $request )
    {
        $rules = [
            'nombre' => 'required',
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',

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
 
        $validate_duplicate = Registro::where('nombre', trim($request->nombre))
                                        ->where('apellido_paterno', trim($request->apellido_paterno))
                                        ->where('apellido_materno', trim($request->apellido_materno))
                                        ->where('distrito', trim($request->distrito))
                                        ->where('seccion', trim($request->seccion))
                                        ->first();
        
        if($validate_duplicate){
            return back()
                ->with('status', 'Ya existe un usuario con los datos que esta agregando');
        }

        try {
            $registro = new Registro();
            $registro->nombre = strtoupper($request->nombre);
            $registro->apellido_paterno = strtoupper($request->apellido_paterno);
            $registro->apellido_materno = strtoupper($request->apellido_materno);
            $registro->sexo = strtoupper($request->sexo);
            $registro->clave = strtoupper($request->clave);
            $registro->correo = $request->email;
            $registro->telefono = $request->phone;
            if(!is_null($request->fecha_nacimiento)){
                $registro->fecha_nac = Carbon::parse($request->fecha_nacimiento)->format('Ymd');
            }
            $registro->lugar_nacimiento = strtoupper($request->lugar_nacimiento);
            
            $registro->facebook = $request->facebook;
            $registro->instagram = $request->instagram;
            $registro->twitter = $request->twitter;

            $registro->calle = strtoupper($request->calle);
            $registro->num_int = strtoupper($request->num_int);
            $registro->num_ext = strtoupper($request->num_ext);
            $registro->colonia = strtoupper($request->colonia);
            $registro->codigo_postal = strtoupper($request->codigo_postal);

            $estado = '';
            $municipio = '';
            if(!is_null($request->state)){
                $sepomex = Sepomex::where('state', $request->state)->first();
                $estado = $sepomex->state;
                $registro->entidad = (int) $sepomex->state_cod;
            }

            if(!is_null($request->city)){
                $sepomex = Sepomex::where('location', $request->city)->first();
                $municipio = $sepomex->location;
                $registro->municipio = (int) $sepomex->locations_cod;
            }

            if(!is_null($request->state) && !is_null($request->city)){
                $registro->geo_referencia =  strtoupper($municipio . ' ,' . substr($estado, 0, 3));
            }

            $registro->distrito = $request->distrito;
            $registro->seccion = $request->seccion;
            $registro->localidad = $request->localidad;
            $registro->manzana = $request->manzana;
            $registro->verificado = 'N';

            $registro->simpatizante = strtoupper($request->simpatizante);
            $registro->demarcacion = strtoupper($request->demarcacion);
            
            if ($registro->save()) {
                return redirect()->route('registros.index');
            }
            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
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
            'apellido_paterno' => 'required',
            'apellido_materno' => 'required',

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

        $validate_duplicate = Registro::where('nombre', trim($request->nombre))
                                        ->where('apellido_paterno', trim($request->apellido_paterno))
                                        ->where('apellido_materno', trim($request->apellido_materno))
                                        ->where('distrito', trim($request->distrito))
                                        ->where('seccion', trim($request->seccion))
                                        ->where('id', '<>', $id)
                                        ->first();
        
        if($validate_duplicate){
            return back()
                ->with('status', 'Ya existe un usuario con los datos que esta agregando');
        }

        try {
            $registro = Registro::where('id', $id)->first();
            $registro->nombre = strtoupper($request->nombre);
            $registro->apellido_paterno = strtoupper($request->apellido_paterno);
            $registro->apellido_materno = strtoupper($request->apellido_materno);
            $registro->sexo = strtoupper($request->sexo);
            $registro->clave = strtoupper($request->clave);
            $registro->correo = $request->email;
            $registro->telefono = $request->phone;
            if(!is_null($request->fecha_nacimiento)){
                $registro->fecha_nac = Carbon::parse($request->fecha_nacimiento)->format('Ymd');
            }
            $registro->lugar_nacimiento = strtoupper($request->lugar_nacimiento);
            
            $registro->facebook = $request->facebook;
            $registro->instagram = $request->instagram;
            $registro->twitter = $request->twitter;

            $registro->calle = strtoupper($request->calle);
            $registro->num_int = strtoupper($request->num_int);
            $registro->num_ext = strtoupper($request->num_ext);
            $registro->colonia = strtoupper($request->colonia);
            $registro->codigo_postal = strtoupper($request->codigo_postal);

            $municipio = '';
            $estado = '';
            if(!is_null($request->state)){
                $sepomex = Sepomex::where('state', $request->state)->first();
                $estado =  $sepomex->state;
                $registro->entidad = (int) $sepomex->state_cod;
            }

            if(!is_null($request->city)){
                $sepomex = Sepomex::where('location', $request->city)->first();
                $municipio = $sepomex->location;
                $registro->municipio = (int) $sepomex->locations_cod;
            }

            if(!is_null($request->state) && !is_null($request->city)){
                $registro->geo_referencia =  strtoupper($municipio . ' ,' . substr($estado, 0, 3));
            }

            $registro->distrito = $request->distrito;
            $registro->seccion = $request->seccion;
            $registro->localidad = $request->localidad;
            $registro->manzana = $request->manzana;

            $registro->simpatizante = strtoupper($request->simpatizante);
            $registro->demarcacion = strtoupper($request->demarcacion);
            $registro->user_id = Auth::user()->id;
            
            if ($registro->update()) {
                return redirect()->route('registros.index');
            }
            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
            //return back()->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 200)');
        }
    }
}
