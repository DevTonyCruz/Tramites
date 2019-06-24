<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Roles;

class RolesController extends Controller
{
    public function index()
    {
        $roles = Roles::latest()->paginate(10);
        return view('admin.roles.index', ["roles" => $roles]);
    }

    public function list(){
        return datatables()->eloquent(Roles::query())->toJson();
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required|max:255',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.max:255' => 'El campo nombre solo permite 255 caracteres',
        ];

        $this->validate($request, $rules, $messages);

        try {

            $rol = Roles::where('name', $request->name)->first();

            if ($rol) {
                return redirect()->back()->withErrors('Ya existe un rol con este nombre.');
            } else {
                $rol = new Roles;

                $rol->name = $request->name;
                $rol->description = $request->description;

                $rol->save();

                return redirect()->route('roles.index');
            }
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $rol = Roles::where('id', $id)->first();
        return view('admin.roles.edit', ["rol" => $rol]);
    }

    public function update(Request $request, $id)
    {

        $rules = [
            'name' => 'required|max:255',
        ];

        $messages = [
            'name.required' => 'El campo nombre es requerido',
            'name.max:255' => 'El campo nombre solo permite 255 caracteres',
        ];

        $this->validate($request, $rules, $messages);

        try {

            $rol = Roles::where('name', $request->name)->where('id', '<>', $id)->first();

            if ($rol) {
                return redirect()->back()->withErrors('Ya existe un rol con este nombre.');
            } else {
                $rol = Roles::where('id', $id)->first();

                $rol->name = $request->name;
                $rol->description = $request->description;

                $rol->save();

                return redirect()->route('roles.index');
            }
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function destroy($id)
    {

        $rol = Roles::where('id', $id)->first();
        $rol->delete();

        return redirect()->route('roles.index');
    }

    public function status($id)
    {

        try {

            $rol = Roles::where('id', '<>', $id)->first();

            if ($rol) {
                $rol = Roles::where('id', $id)->first();

                if ($rol->status == 1) {
                    $rol->status = 0;
                } else {
                    $rol->status = 1;
                }

                $rol->save();

                return redirect()->route('roles.index');
            } else {
                return redirect()->back()->withErrors('No se puede cambiar el estatus de este usuario.');
            }
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function permission($id)
    {
        $permissions = Permissions::get();

        $permisos = ['grupos' => [], 'permisos' => [], 'relacion' => []];

        foreach ($permissions as $permission) {
            if (!in_array($permission->controller, $permisos["grupos"])) {
                array_push($permisos["grupos"], $permission->controller);
            }
        }

        $relacion = Relation_rol_permission::where('rol_id', $id)->pluck('permission_id');
        if($relacion){
            $permisos["relacion"] = $relacion->toArray();
        }

        $permisos["permisos"] = $permissions->toArray();

        return view('admin.roles.permission', ['permisos' => $permisos, 'id' => $id]);
    }

    public function save_permission(Request $request, $id)
    {
        $array = request()->all();

        Relation_rol_permission::where('rol_id', $id)->delete();

        try {

            foreach ($array as $permisos) {
                if (is_array($permisos)) {
                    foreach ($permisos as $permiso) {

                        $addPermiso = new Relation_rol_permission();

                        $addPermiso->rol_id = $id;
                        $addPermiso->permission_id = $permiso;

                        $addPermiso->save();
                    }
                }
            }

            return redirect()->route('roles.index');
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
