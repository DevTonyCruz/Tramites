<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Database\QueryException;

use Hash;
use Validator;
use Auth;
use Illuminate\Support\Carbon;
use App\Models\Roles;

class UsersController extends Controller
{
    public function index()
    {
        //$users = User::where('id', '<>', Auth::user()->id)->get();
        $users = User::get();
        return view('users.index', [
            "users" => $users
        ]);
    }

    public function list()
    {
        return datatables()->eloquent(User::where('id', '<>', Auth::user()->id)->query())->toJson();
    }

    public function create()
    {
        $roles = Roles::get();
        return view('users.create', [
            "roles" => $roles
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'first_last_name' => 'required|string|max:255',
            'second_last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            //'phone' => 'max:10',
            'rol_id' => 'required|numeric',
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
            //'phone.max:10' => 'El campo telefono solo permite :max caracteres',
            'email.string' => 'El campo email debe ser texto',
            'email.unique' => 'El email que ingreso ya se encuentra registrado',
            'rol_id.required' => 'El campo rol es requerido',
            'rol_id.numeric' => 'Debe seleccionar un rol correcto',
            'password.required' => 'El campo contraseña es requerido',
            'password.min' => 'El campo contraseña debe contener al menos :min caracteres',
            'password.string' => 'El campo contraseña debe ser texto',
            'password.confirmed' => 'Debe confirmar la contraseña correctamente',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        if(!is_null($request->phone) && strlen($request->phone) != 14){
            return back()
                ->withInput()
                ->withErrors(['phone' => 'El campo telefono debe de contener 10 dígitos']);;
        }

        try {

            $user = new User();
            $user->name = $request->name;
            $user->first_last_name = $request->first_last_name;
            $user->second_last_name = $request->second_last_name;
            $user->fullname = $request->name . ' ' . $request->first_last_name . ' ' . $request->second_last_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->rol_id = $request->rol_id;
            $user->password = Hash::make($request->password);
            $user->created_by = Auth::user()->id;
            $user->updated_by = Auth::user()->id;
            $user->created_at = Carbon::now()->format('Y-m-d H:i:s');
            $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($user->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($user));

                return redirect()->route('users.index');
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
        $user = User::where('id', $id)->first();
        $roles = Roles::get();
        return view('users.edit', [
            "user" => $user,
            "roles" => $roles
        ]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required|string|max:255',
            'first_last_name' => 'required|string|max:255',
            'second_last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'rol_id' => 'required|numeric',
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
            'rol_id.required' => 'El campo rol es requerido',
            'rol_id.numeric' => 'Debe seleccionar un rol correcto',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        if(!is_null($request->phone) && strlen($request->phone) != 14){
            return back()
                ->withInput()
                ->withErrors(['phone' => 'El campo telefono debe de contener 10 dígitos']);;
        }

        try {

            $user = User::where('id', $id)->first();
            $user->name = $request->name;
            $user->first_last_name = $request->first_last_name;
            $user->second_last_name = $request->second_last_name;
            $user->fullname = $request->name . ' ' . $request->first_last_name . ' ' . $request->second_last_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->rol_id = $request->rol_id;
            $user->updated_by = Auth::user()->id;
            $user->updated_at = Carbon::now()->format('Y-m-d H:i:s');

            if ($user->save()) {
                //Mail::to($request->email)->send(new RegisterUserMail($user));

                return redirect()->route('users.index');
            }

            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)');
        } catch (QueryException $e) {
            //return back()->with('status', $e->getMessage());
            return back()
                ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 200)');
        }
    }

    public function destroy($id)
    {
        $user = User::where('id', $id)->first();

        if ($user->delete()) {

            return redirect()->route('users.index');
        }

        return back()
            ->with('status', 'Por el momento no podemos realizar la acción solicitada, intente más tarde. (Code 100)')
            ->withInput();
    }

    public function password($id)
    {
        $user = User::where('id', $id)->first();
        return view('users.password', [
            "user" => $user
        ]);
    }

    public function updatePassword(Request $request)
    {
        $rules = [
            'my_password' => 'required',
            'password' => 'required|confirmed|min:8'
        ];

        $messages = [
            'my_password.required' => 'El campo contraseña actual es requerido',
            'password.required' => 'El campo nueva contraseña es requerido',
            'password.min:8' => 'El campo campo nueva contraseña debe contener al menos 8 caracteres',
            'password.confirmed' => 'El campo nueva contraseña y confirmar nueva contraseña deben coincidir',
        ];

        $this->validate($request, $rules, $messages);

        try {

            if (Hash::check($request->my_password, Auth::user()->password)) {
                $user = User::where('email', Auth::user()->email)->first();

                $user->password = bcrypt($request->password);

                if ($user->save()) {
                    //Auth::logout();

                    return redirect()->route('users.index');
                }

                return back()->with('status', 'Por el momento no se puede realizar la acción solicitada.');
            }

            return back()
                    ->withInput()
                    ->withErrors(['my_password' => 'El campo contraseña actual no es correcto']);

        } catch (QueryException $e) {
            return back()->with('status', $e->getMessage());
        }
    }
}
