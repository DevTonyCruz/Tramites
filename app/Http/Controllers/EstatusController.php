<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstatusController extends Controller
{
    public function index()
    {
        //
    }

    public function list()
    {
        return datatables()->eloquent(User::query())->toJson();
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
