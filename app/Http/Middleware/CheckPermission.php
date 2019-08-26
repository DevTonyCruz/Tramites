<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Relation_rol_permission;

class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $rol = $request->user()->rol;
        $ruta = \Request::route()->getName();

        //dd($ruta);

        $relacion = Relation_rol_permission::where('rol_id', $rol->id)->get();

        $filter = $relacion->filter(function($value) use($ruta){
            if ($value->permiso->slug == $ruta) {
                return true;
            }
        });

        if($filter->count() > 0){
            return $next($request);
        }

        return redirect('home')->with('status', 'El usuario no tiene permisos para realizar esta acción.');
    }
}
