<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramites;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Gestion;
use App\Models\Remitente;

class TramitesController extends Controller
{
    public function index()
    {
        return view('tramites.index');
    }

    public function list()
    {
        return datatables()->eloquent(Tramites::query())->toJson();
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

    public function beneficiario(Request $request)
    {
        $rules = [
            'name' => 'required',
            'appaterno' => 'required',
            'apmaterno' => 'required',
            'email' => 'required|email',
            'direccion' => 'required',
            'exterior' => 'required',
            'sepomex_id' => 'required|numeric',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'appaterno.required' => 'El campo apellido paterno es requerido',
            'apmaterno.required' => 'El campo apellido materno es requerido',
            'direccion.required' => 'El campo calle es requerido',
            'exterior.required' => 'El campo número exterior es requerido',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email no es válido',
            'sepomex_id.required' => 'El código postal es requerido',
            'sepomex_id.numeric' => 'El código postal no es válido',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
            /*return back()
                ->withErrors($validator)
                ->withInput();*/
        }

        try {

            $tramite = new Tramites();
            $tramite->nombre = $request->name;
            $tramite->appaterno = $request->appaterno;
            $tramite->apmaterno = $request->apmaterno;
            $tramite->direccion = $request->direccion;
            $tramite->interior = $request->interior;
            $tramite->exterior = $request->exterior;
            $tramite->email = $request->email;
            $tramite->telefono = $request->phone;
            $tramite->sepomex_id = $request->sepomex_id;
            $tramite->created_by = Auth::user()->id;
            $tramite->updated_by = Auth::user()->id;
            $tramite->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $tramite->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($tramite->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($tramite));

                return response()->json(["error" => "no"])->setStatusCode(200, "Registro guardado con exito");
            }

            abort(401, 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
            /*return response()
                    ->json(["error" => "si"])->setStatusCode(400,"Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)");*/

            /*return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)')
                ->withInput();;*/
        } catch (QueryException $e) {
            abort(401, 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
            //return response()->json(["error" => "si"])->setStatusCode(400,"Error:" + $e + ". (Code 100)");
            //return back()->with('status', $e->getMessage());
            /*return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 200)')
                ->withInput();;*/
        }
    }

    public function edit($id)
    {
        $tramite = User::where('id', $id)->first();
        return view('tramites.edit', ["user" => $tramite]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'first_last_name' => 'required|string|max:255',
            'second_last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            //'email' => 'required|string|email|max:255|unique:tramite',
            //'rol_id' => 'required|numeric',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.max:255' => 'El campo nombre solo permite 255 caracteres',
            'name.string' => 'El campo nombre debe ser texto',
            'first_last_name.required' => 'El campo apellido paterno es requerido',
            'first_last_name.required' => 'El campo apellido paterno solo permite 255 caracteres',
            'first_last_name.required' => 'El campo apellido paterno debe ser texto',
            'second_last_name.required' => 'El campo apellido materno es requerido',
            'second_last_name.max:255' => 'El campo apellido materno solo permite 255 caracteres',
            'second_last_name.string' => 'El campo apellido materno debe ser texto',
            'email.required' => 'El campo email es requerido',
            'email.email' => 'El campo email no es válido',
            'email.max:255' => 'El campo email solo permite 255 caracteres',
            'email.string' => 'El campo email debe ser texto',
            //'email.unique' => 'El email que ingreso ya se encuentra registrado',
            //'rol_id.required' => 'El campo rol es requerido',
            //'rol_id.numeric' => 'Debe seleccionar un rol correcto',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $tramite = User::where('id', $id)->first();
            $tramite->name = $request->name;
            $tramite->first_last_name = $request->first_last_name;
            $tramite->second_last_name = $request->second_last_name;
            $tramite->fullname = $request->name . ' ' . $request->first_last_name . ' ' . $request->second_last_name;
            $tramite->phone = $request->phone;
            $tramite->email = $request->email;
            $tramite->updated_by = Auth::user()->id;
            $tramite->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $tramite->rol_id = 2;

            if ($tramite->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($tramite));

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
        $tramite = User::where('id', $id)->first();

        if($tramite->delete()){

            return redirect()->route('tramites.index');
        }

        return back()
            ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)')
            ->withInput();
    }
}
