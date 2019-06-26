<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestion;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class GestionController extends Controller
{
    public function index()
    {
        return view('gestion.index');
    }

    public function list()
    {
        return datatables()->eloquent(Gestion::query())->toJson();
    }

    public function create()
    {
        return view('gestion.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.max:255' => 'El campo nombre solo permite 255 caracteres',
            'nombre.string' => 'El campo nombre debe ser texto',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }


        try {

            $gestion = new Gestion();
            $gestion->nombre = $request->nombre;
            $gestion->descripcion = $request->descripcion;
            $gestion->status = 1;
            $gestion->created_by = Auth::user()->id;
            $gestion->updated_by = Auth::user()->id;
            $gestion->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $gestion->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($gestion->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($user));

                return redirect()->route('gestion.index');
            }

            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)')
                ->withInput();;
        } catch (QueryException $e) {
            //return back()->with('status', $e->getMessage());
            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 200)')
                ->withInput();;
        }
    }

    public function edit($id)
    {
        $gestion = Gestion::where('id', $id)->first();
        return view('gestion.edit', ["gestion" => $gestion]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.max:255' => 'El campo nombre solo permite 255 caracteres',
            'nombre.string' => 'El campo nombre debe ser texto',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $gestion = Gestion::where('id', $id)->first();
            $gestion->nombre = $request->nombre;
            $gestion->descripcion = $request->descripcion;
            $gestion->status = 1;
            $gestion->updated_by = Auth::user()->id;
            $gestion->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($gestion->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($user));

                return redirect()->route('gestion.index');
            }

            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)')
                ->withInput();;
        } catch (QueryException $e) {
            //return back()->with('status', $e->getMessage());
            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 200)')
                ->withInput();;
        }
    }

    public function destroy($id)
    {
        $gestion = Gestion::where('id', $id)->first();

        if($gestion->delete()){

            return redirect()->route('gestion.index');
        }

        return back()
            ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)')
            ->withInput();
    }
}
