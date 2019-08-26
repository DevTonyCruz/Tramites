<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Remitente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use App\Models\Tramites;

class RemitenteController extends Controller
{
    public function index()
    {
        return view('remitente.index');
    }

    public function list()
    {
        return datatables()->eloquent(Remitente::query())->toJson();
    }

    public function create()
    {
        return view('remitente.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'appaterno' => 'required|string|max:255',
            'apmaterno' => 'required|string|max:255',
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.max:255' => 'El campo nombre solo permite 255 caracteres',
            'nombre.string' => 'El campo nombre debe ser texto',
            'appaterno.required' => 'El campo apellido paterno es requerido',
            'appaterno.required' => 'El campo apellido paterno solo permite 255 caracteres',
            'appaterno.required' => 'El campo apellido paterno debe ser texto',
            'apmaterno.required' => 'El campo apellido materno es requerido',
            'apmaterno.max:255' => 'El campo apellido materno solo permite 255 caracteres',
            'apmaterno.string' => 'El campo apellido materno debe ser texto',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $remitente = new Remitente();
            $remitente->nombre = $request->nombre;
            $remitente->appaterno = $request->appaterno;
            $remitente->apmaterno = $request->apmaterno;
            $remitente->created_by = Auth::user()->id;
            $remitente->updated_by = Auth::user()->id;
            $remitente->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $remitente->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($remitente->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($user));

                return redirect()->route('remitente.index');
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
        $remitente = Remitente::where('id', $id)->first();
        return view('remitente.edit', ["remitente" => $remitente]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'appaterno' => 'required|string|max:255',
            'apmaterno' => 'required|string|max:255',
        ];

        $messages = [
            'nombre.required' => 'El campo nombre es requerido',
            'nombre.max:255' => 'El campo nombre solo permite 255 caracteres',
            'nombre.string' => 'El campo nombre debe ser texto',
            'appaterno.required' => 'El campo apellido paterno es requerido',
            'appaterno.required' => 'El campo apellido paterno solo permite 255 caracteres',
            'appaterno.required' => 'El campo apellido paterno debe ser texto',
            'apmaterno.required' => 'El campo apellido materno es requerido',
            'apmaterno.max:255' => 'El campo apellido materno solo permite 255 caracteres',
            'apmaterno.string' => 'El campo apellido materno debe ser texto',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $remitente = Remitente::where('id', $id)->first();
            $remitente->nombre = $request->nombre;
            $remitente->appaterno = $request->appaterno;
            $remitente->apmaterno = $request->apmaterno;
            $remitente->updated_by = Auth::user()->id;
            $remitente->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($remitente->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($user));

                return redirect()->route('remitente.index');
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
        $tramites = Tramites::where('remitente_id', $id)->count();

        if($tramites == 0){
            $remitente = Remitente::where('id', $id)->first();

            if($remitente->delete()){

                return redirect()->route('remitente.index');
            }

            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
        }else{

            return back()->with('status', 'No es posible borrar este remitente ya que existen tramites relacionados a el.');
        }
    }
}
