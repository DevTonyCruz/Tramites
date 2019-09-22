<?php

namespace App\Http\Controllers;

use App\Models\Registro;
use Illuminate\Http\Request;

class RegistrosController extends Controller
{
    public function index()
    {
        $registro = Registro::get();
        return view('registros.index', [
            "registros" => $registro,
        ]);
    }
    
    public function edit($id)
    {
        $registro = Registro::where('id', $id)->first();
        return view('registros.edit', [
            "registro" => $registro
        ]);
    }
}
