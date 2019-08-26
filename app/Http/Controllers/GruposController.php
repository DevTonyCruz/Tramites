<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grupos;
use Illuminate\Database\QueryException;
use App\Models\Directorio;

class GruposController extends Controller
{
    public function index()
    {
        $grupos = Grupos::latest()->paginate(10);
        return view('grupos.index', ["grupos" => $grupos]);
    }

    public function list()
    {
        return datatables()->eloquent(Grupos::query())->toJson();
    }

    public function create()
    {
        return view('grupos.create');
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

            $grupo = Grupos::where('nombre', $request->nombre)->first();

            if ($grupo) {
                return back()->withInput()->withErrors(['nombre' => 'Ya existe un registro con este nombre.']);
            } else {
                $grupo = new Grupos();

                $grupo->nombre = $request->nombre;
                $grupo->descripcion = $request->descripcion;

                if ($grupo->save()) {

                    return redirect()->route('grupos.index');
                }

                return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');
            }
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $grupo = Grupos::where('id', $id)->first();
        return view('grupos.edit', ["grupo" => $grupo]);
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

            $grupo = Grupos::where('id', '<>', $id)->where('nombre', $request->nombre)->first();

            if ($grupo) {
                return back()->withInput()->withErrors(['nombre' => 'Ya existe un registro con este nombre.']);
            } else {
                $grupo = Grupos::where('id', $id)->first();

                $grupo->nombre = $request->nombre;
                $grupo->descripcion = $request->descripcion;

                if ($grupo->save()) {

                    return redirect()->route('grupos.index');
                }

                return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');
            }
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $directorio = Directorio::where('id_grupos', $id)->count();

        if ($directorio == 0) {

            try {
                $grupo = Grupos::where('id', $id)->first();

                if ($grupo->delete()) {

                    return redirect()->route('grupos.index');
                }

                return back()->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde.');
            } catch (QueryException $e) {
                return back()->with('status', $e->getMessage());
            }

        }
        return back()->with('status', 'No es posible borrar este grupo ya que existen registros relacionados a el.');
    }

    public function status($id)
    {
        try {

            $grupo = Grupos::where('id', $id)->first();

            if ($grupo->status == 1) {
                $grupo->status = 0;
            } else {
                $grupo->status = 1;
            }

            if ($grupo->save()) {

                return redirect()->route('grupos.index');
            }

            return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');
        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
    }
}
