<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Fechas;
use Illuminate\Database\QueryException;

class FechasController extends Controller
{
    public function index()
    {
        $fechas = Fechas::latest()->paginate(10);
        return view('fechas.index', ["fechas" => $fechas]);
    }

    public function list(){
        return datatables()->eloquent(Fechas::query())->toJson();
    }

    public function create()
    {
        return view('fechas.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
        ];

        $this->validate($request, $rules, $messages);

        try {

            $fecha = Fechas::where('nombre', $request->nombre)->first();

            if ($fecha) {
                return back()->withInput()->withErrors(['nombre' => 'Ya existe un registro con este nombre.']);
            } else {
                $fecha = new Fechas();

                $fecha->nombre = $request->nombre;
                $fecha->descripcion = $request->descripcion;
                if($request->hash('fecha')){
                    $fecha->fecha = Carbon::parse($request->fecha)->format('Y-m-d H:i:s');
                }

                if ($fecha->save()) {

                    return redirect()->route('fechas.index');
                }

                return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');
            }
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $fecha = Fechas::where('id', $id)->first();
        return view('fechas.edit', ["fecha" => $fecha]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nombre' => 'required',
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
        ];

        $this->validate($request, $rules, $messages);

        try {

            $fecha = Fechas::where('id', '<>', $id)->where('nombre', $request->nombre)->first();

            if ($fecha) {
                return back()->withInput()->withErrors(['nombre' => 'Ya existe un registro con este nombre.']);
            } else {
                $fecha = Fechas::where('id', $id)->first();

                $fecha->nombre = $request->nombre;
                $fecha->descripcion = $request->descripcion;
                if($request->hash('fecha')){
                    $fecha->fecha = Carbon::parse($request->fecha)->format('Y-m-d H:i:s');
                }

                if ($fecha->save()) {

                    return redirect()->route('fechas.index');
                }

                return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');
            }
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $fecha = Fechas::where('id', $id)->first();

        if($fecha->delete()){

            return redirect()->route('fechas.index');
        }

        return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');
    }

    public function status($id)
    {
        try {

            $fecha = Fechas::where('id', $id)->first();

            if ($fecha->status == 1) {
                $fecha->status = 0;
            } else {
                $fecha->status = 1;
            }

            if($fecha->save()){

                return redirect()->route('fechas.index');
            }

            return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');

        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
    }
}
