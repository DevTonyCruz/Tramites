<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tramites;

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
        return view('tramites.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'first_last_name' => 'required|string|max:255',
            'second_last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            //'rol_id' => 'required|numeric',
            'password' => 'required|string|min:6|confirmed',
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
            'email.unique' => 'El email que ingreso ya se encuentra registrado',
            //'rol_id.required' => 'El campo rol es requerido',
            //'rol_id.numeric' => 'Debe seleccionar un rol correcto',
            'password.required' => 'El campo contraseña es requerido',
            'password.min:6' => 'El campo contraseña debe contener al menos 6 caracteres',
            'password.string' => 'El campo contraseña debe ser texto',
            'password.confirmed' => 'Debe confirmar la contraseña correctamente',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {

            $user = new User();
            $user->name = $request->name;
            $user->first_last_name = $request->first_last_name;
            $user->second_last_name = $request->second_last_name;
            $user->fullname = $request->name . ' ' . $request->first_last_name . ' ' . $request->second_last_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->created_by = Auth::user()->id;
            $user->updated_by = Auth::user()->id;
            $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->rol_id = 2;

            if ($user->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($user));

                return redirect()->route('users.index');
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
        $user = User::where('id', $id)->first();
        return view('users.edit', ["user" => $user]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'first_last_name' => 'required|string|max:255',
            'second_last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            //'email' => 'required|string|email|max:255|unique:users',
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

            $user = User::where('id', $id)->first();
            $user->name = $request->name;
            $user->first_last_name = $request->first_last_name;
            $user->second_last_name = $request->second_last_name;
            $user->fullname = $request->name . ' ' . $request->first_last_name . ' ' . $request->second_last_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->updated_by = Auth::user()->id;
            $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->rol_id = 2;

            if ($user->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($user));

                return redirect()->route('users.index');
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

    public function status()
    {
        return view('users.index');
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        if($user->delete()){

            return redirect()->route('users.index');
        }

        return back()
            ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)')
            ->withInput();
    }
}
