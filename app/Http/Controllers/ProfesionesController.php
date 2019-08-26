<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profesiones;
use Illuminate\Database\QueryException;
use App\Models\Directorio;
use Carbon\Carbon;

class ProfesionesController extends Controller
{
    public function index()
    {
        $profesions = Profesiones::get();
        return view('profesiones.index', ["profesiones" => $profesions]);
    }

    public function list(){
        return datatables()->eloquent(Profesiones::query())->toJson();
    }

    public function create()
    {
        return view('profesiones.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'fecha' => 'required',
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
            'fecha.required' => 'El campo fecha es requerido',
        ];

        $this->validate($request, $rules, $messages);

        try {

            $profesion = Profesiones::where('nombre', $request->nombre)->first();

            if ($profesion) {
                return back()->withInput()->withErrors(['nombre' => 'Ya existe un registro con este nombre.']);
            } else {
                $profesion = new Profesiones();

                $profesion->nombre = $request->nombre;
                $profesion->descripcion = $request->descripcion;

                $fecha = explode('/', $request->fecha);
                $profesion->dia = $fecha[1];
                $profesion->mes = $fecha[0];

                if ($profesion->save()) {

                    return redirect()->route('profesiones.index');
                }

                return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');
            }
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $profesion = Profesiones::where('id', $id)->first();
        return view('profesiones.edit', ["grupo" => $profesion]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nombre' => 'required',
            'fecha' => 'required',
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
            'fecha.required' => 'El campo fecha es requerido',
        ];

        $this->validate($request, $rules, $messages);

        try {

            $profesion = Profesiones::where('id', '<>', $id)->where('nombre', $request->nombre)->first();

            if ($profesion) {
                return back()->withInput()->withErrors(['nombre' => 'Ya existe un registro con este nombre.']);
            } else {
                $profesion = Profesiones::where('id', $id)->first();

                $profesion->nombre = $request->nombre;
                $profesion->descripcion = $request->descripcion;

                $fecha = explode('/', $request->fecha);
                $profesion->dia = $fecha[1];
                $profesion->mes = $fecha[0];

                if ($profesion->save()) {

                    return redirect()->route('profesiones.index');
                }

                return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');
            }
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $directorio = Directorio::where('remitente_id', $id)->count();

        if ($directorio == 0) {
            $profesion = Profesiones::where('id', $id)->first();

            if($profesion->delete()){

                return redirect()->route('profesiones.index');
            }

            return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');
        }else{

            return back()->with('status', 'No es posible borrar esta profesión ya que existen registros relacionados a el.');
        }
    }

    public function status($id)
    {
        try {

            $profesion = Profesiones::where('id', $id)->first();

            if ($profesion->status == 1) {
                $profesion->status = 0;
            } else {
                $profesion->status = 1;
            }

            if($profesion->save()){

                return redirect()->route('profesiones.index');
            }

            return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');

        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
    }
}
