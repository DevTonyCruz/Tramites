<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramites;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Gestion;
use App\Models\Remitente;
use Illuminate\Support\Facades\Storage;
use App\Exports\TramitesExport;
use Maatwebsite\Excel\Facades\Excel;

class TramitesController extends Controller
{
    public function index()
    {
        $cerrados = Tramites::status('C')->count();
        $porvencer = Tramites::status('P')->count();
        $vencidos = Tramites::status('V')->count();

        $entramiteNull = Tramites::whereNull('fecha_fin')->where('status', 1)->get();
        $entramiteNotNull = Tramites::status('E')->get();

        $entramite = $entramiteNull->merge($entramiteNotNull)->count();

        return view('tramites.index',[
            "cerrados" => $cerrados,
            "porvencer" => $porvencer,
            "vencidos" => $vencidos,
            "entramite" => $entramite,
        ]);
    }

    public function list()
    {
        $model = Tramites::with(['gestion', 'remitente', 'Sepomex']);

        return datatables()->eloquent($model)
            ->addColumn('estatus', function (Tramites $tramites) {

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

                return $estatus;
            })->toJson();
        //return datatables()->eloquent(Tramites::query())->toJson();
    }

    public function create()
    {
        $gestiones = Gestion::all();
        $remitentes = Remitente::all();
        return view('tramites.create', [
            "gestiones" => $gestiones,
            "remitentes" => $remitentes,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'appaterno' => 'required',
            //'email' => 'email',
            'phone' => 'max:15',
            'direccion' => 'required',
            'exterior' => 'required',
            'sepomex_id' => 'required|numeric',
            'zip_code' => 'required',

            'seccional' => 'required',
            'demarcacion' => 'required',
            'distrito' => 'required',
            'gestion' => 'required|numeric',
            'remitente' => 'required|numeric',
            'fecha_ini' => 'required',

            'ife' => 'max:50',
            'file' => 'mimes:png,jpeg,jpg',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'appaterno.required' => 'El campo apellido paterno es requerido',
            'direccion.required' => 'El campo calle es requerido',
            'exterior.required' => 'El campo número exterior es requerido',
            //'email.email' => 'El campo email no es válido',
            'phone.max' => 'El campo teléfono debe de contener como máximo 10 digitos',
            'sepomex_id.required' => 'El código postal es requerido',
            'sepomex_id.numeric' => 'El código postal no es válido',
            'zip_code.required' => 'Debe seleccionar una colonia',

            'seccional.required' => 'El campo seccional es requerido',
            'demarcacion.required' => 'El campo demarcación es requerido',
            'distrito.required' => 'El campo distrito es requerido',
            'gestion.required' => 'El campo gestion es requerido',
            'gestion.numeric' => 'El campo gestion no es válido',
            'remitente.required' => 'El campo remitente es requerido',
            'remitente.numeric' => 'El campo remitente no es válid',
            'fecha_ini.required' => 'El campo fecha inicial es requerido',

            'ife.max' => 'El campo INE debe de contener como máximo 50 digitos',
            'file.mimes' => 'El campo imagen no contiene un archvivo válido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $tramite = new Tramites();
            $tramite->nombre = $request->name;
            $tramite->appaterno = $request->appaterno;
            $tramite->apmaterno = $request->apmaterno;
            $tramite->direccion = $request->direccion;
            $tramite->interior = $request->interior;
            $tramite->exterior = $request->exterior;
            $tramite->sepomex_id = $request->sepomex_id;
            $tramite->email = $request->email;
            $tramite->telefono = $request->phone;

            $tramite->seccional = $request->seccional;
            $tramite->demarcacion = $request->demarcacion;
            $tramite->distrito = $request->distrito;
            $tramite->simpatizante = $request->simpatizante;
            $tramite->gestion_id = $request->gestion;
            $tramite->remitente_id = $request->remitente;

            $tramite->cantidad = $request->cantidad;
            $tramite->ife = $request->ife;
            $tramite->observaciones = $request->observaciones;

            $tramite->fecha_ini = Carbon::parse($request->fecha_ini)->format('Y-m-d H:i:s');

            if (!isset($request->sin_fecha)) {
                $tramite->fecha_fin = Carbon::parse($request->fecha_fin)->format('Y-m-d H:i:s');
            }

            $tramite->status = 1;
            $tramite->created_by = Auth::user()->id;
            $tramite->updated_by = Auth::user()->id;
            $tramite->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $tramite->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($tramite->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($tramite));

                if ($request->file('foto')) {
                    $path = Storage::disk('public')->put('images/storage/tramites', $request->file('foto'));
                    $tramite->fill(['foto' => $path])->save();
                }

                return redirect()->route('tramites.index');
            }

            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
        } catch (QueryException $e) {
            //return back()->with('status', $e->getMessage());
            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 200)');
        }
    }

    public function edit($id)
    {
        $tramite = Tramites::where('id', $id)->first();
        $gestiones = Gestion::all();
        $remitentes = Remitente::all();
        return view('tramites.edit', [
            "tramite" => $tramite,
            "gestiones" => $gestiones,
            "remitentes" => $remitentes,
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'appaterno' => 'required',
            //'email' => 'email',
            'phone' => 'max:15',
            'direccion' => 'required',
            'exterior' => 'required',
            'exterior' => 'numeric',
            'zip_code' => 'required|numeric',

            'seccional' => 'required',
            'demarcacion' => 'required',
            'distrito' => 'required',
            'gestion' => 'required|numeric',
            'remitente' => 'required|numeric',
            'fecha_ini' => 'required',

            'ife' => 'max:50',
            'file' => 'mimes:png,jpeg,jpg',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'appaterno.required' => 'El campo apellido paterno es requerido',
            'direccion.required' => 'El campo calle es requerido',
            'exterior.required' => 'El campo número exterior es requerido',
            //'email.email' => 'El campo email no es válido',
            'phone.max' => 'El campo télefono debe de contener como máximo 10 digitos',
            'sepomex_id.required' => 'El código postal es requerido',
            'sepomex_id.numeric' => 'El código postal no es válido',
            'zip_code.required' => 'Debe seleccionar una colonia',

            'seccional.required' => 'El campo seccional es requerido',
            'demarcacion.required' => 'El campo demarcación es requerido',
            'distrito.required' => 'El campo distrito es requerido',
            'gestion.required' => 'El campo gestion es requerido',
            'gestion.numeric' => 'El campo gestion no es válido',
            'remitente.required' => 'El campo remitente es requerido',
            'remitente.numeric' => 'El campo remitente no es válid',
            'fecha_ini.required' => 'El campo fecha inicial es requerido',

            'ife.max' => 'El campo INE debe de contener como máximo 50 digitos',
            'file.mimes' => 'El campo imagen no contiene un archvivo válido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $tramite = Tramites::where('id', $id)->first();
            $tramite->nombre = $request->name;
            $tramite->appaterno = $request->appaterno;
            $tramite->apmaterno = $request->apmaterno;
            $tramite->direccion = $request->direccion;
            $tramite->interior = $request->interior;
            $tramite->exterior = $request->exterior;
            $tramite->sepomex_id = $request->sepomex_id;
            $tramite->email = $request->email;
            $tramite->telefono = $request->phone;

            $tramite->seccional = $request->seccional;
            $tramite->demarcacion = $request->demarcacion;
            $tramite->distrito = $request->distrito;
            $tramite->simpatizante = $request->simpatizante;
            $tramite->gestion_id = $request->gestion;
            $tramite->remitente_id = $request->remitente;

            $tramite->cantidad = $request->cantidad;
            $tramite->ife = $request->ife;
            $tramite->observaciones = $request->observaciones;

            $tramite->fecha_ini = Carbon::parse($request->fecha_ini)->format('Y-m-d H:i:s');

            if (!isset($request->sin_fecha)) {
                $tramite->fecha_fin = Carbon::parse($request->fecha_fin)->format('Y-m-d H:i:s');
            }else{
                $tramite->fecha_fin = null;
            }

            if (isset($request->status)) {
                $tramite->status = 0;
            }else{
                $tramite->status = 1;
            }

            $tramite->updated_by = Auth::user()->id;
            $tramite->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $tramite->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($tramite->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($tramite));

                if ($request->file('foto')) {

                    if(@getimagesize(asset($tramite->foto))){
                        unlink($tramite->foto);
                    }

                    $path = Storage::disk('public')->put('images/storage/tramites', $request->file('foto'));
                    $tramite->fill(['foto' => $path])->save();
                }

                return redirect()->route('tramites.index');
            }

            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)')
                ->withInput();
        } catch (QueryException $e) {
            //return back()->with('status', $e->getMessage());
            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 200)')
                ->withInput();
        }
    }

    public function destroy($id)
    {
        $tramite = Tramites::where('id', $id)->first();

        if ($tramite->delete()) {

            return redirect()->route('tramites.index');
        }

        return back()
            ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
    }

    public function export(Request $request)
    {
        $fecha_ini = '';
        $fecha_fin = '';
        $sin_fecha = 1;
        if(!$request->has('sin_fecha')){
            $rules = [
                'fecha_ini' => 'required|date_format:m/d/Y',
                'fecha_fin' => 'required|date_format:m/d/Y'
            ];
    
            $messages = [
                'fecha_ini.required' => 'La fecha inicial es requerida',
                'fecha_ini.date_format' => 'El formato de la fecha inicial no es correcto',
                'fecha_fin.required' => 'La fecha final es requerida',
                'fecha_fin.date_format' => 'El formato de la fecha final no es correcto'
            ];
    
            $validator = Validator::make($request->all(), $rules, $messages);
    
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $fecha_ini = Carbon::parse($request->fecha_ini)->format('Y-m-d');
            $fecha_fin = Carbon::parse($request->fecha_fin)->format('Y-m-d');
            $sin_fecha = 0;
        }

        $data = [
            "fecha_ini" => $fecha_ini,
            "fecha_fin" => $fecha_fin,
            "status" => $request->status,
            "sin_fecha" => $sin_fecha,
        ];

        return Excel::download(new TramitesExport($data), 'tramites.xlsx');
    }
}
