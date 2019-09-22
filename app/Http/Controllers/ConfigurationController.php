<?php

namespace App\Http\Controllers;

use App\Models\Configurations;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfigurationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $configurations = Configurations::get();
        return view('configurations.index', ['configurations' => $configurations]);
    }

    /**
     * Show the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $configuration = Configurations::where('id', $id)->first();
        return view('configurations.show', ["configuration" => $configuration]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $configuration = Configurations::where('id', $id)->first();
        return view('configurations.edit', ["configuration" => $configuration]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = ['value' => ''];
        $messages = [];

        $configuration = Configurations::where('id', $id)->first();
        $validation = false;

        if ($configuration->required > 0) {
            $rules['value'] .= 'required|';
            $messages['value.required'] = 'El campo valor es requerido';
            $validation = true;
        }

        switch ($configuration->type) {
            case 'email':
                $rules['value'] .= 'email|';
                $messages['value.email'] = 'El campo valor no es un correo válido';
                $validation = true;
                break;
            case 'numeric':
                $rules['value'] .= 'numeric|';
                $messages['value.numeric'] = 'El campo valor debe ser numérico';
                $validation = true;
                break;
            case 'file':
                $rules['value'] .= 'mimes:png,jpeg,jpg|';
                $messages['value.mimes'] = 'El campo valor solo acepta los siguientes formatos; png, jpeg y jpg';
                $validation = true;
                break;
            case 'file':
                $rules['value'] .= 'mimes:png,jpeg,jpg|';
                $messages['value.mimes'] = 'El campo valor solo acepta los siguientes formatos; png, jpeg y jpg';
                $validation = true;
                break;
            default:
                break;
        }

        if ($configuration->text_lenght > 0) {
            $rules['value'] .= 'max:' . $configuration->text_lenght . '|';
            $messages['value.max'] = ['string' => 'El campo valor no puede contener mas de :max caracteres'];
            $validation = true;
        }

        $rules['value'] = substr($rules['value'], 0, -1);

        if ($validation) {
            $this->validate($request, $rules, $messages);
        }

        if ($configuration->type == 'email') {
            $request->value = strtolower($request->value);
        }

        //linear-gradient(135deg,rgba(46,52,81,.4) 0%,rgba(52,40,104,.95) 100%)
        try {

            switch ($configuration->type) {
                case 'file':
                    if (!empty($configuration->value)) {
                        if (file_exists($configuration->value)) {
                            unlink($configuration->value);
                        }
                    }

                    $path = $this->save_image($request->value, $configuration->alias);
                    $save = $configuration->fill(['value' => $path])->save();

                    if ($save) {

                        return redirect()->route('configuration.index');
                    }

                    return back()->with('error', 'Por el momento no se puede realizar la acción solicitada.');
                    break;
                default:
                    $configuration->value = $request->value;

                    if ($configuration->save()) {

                        return redirect()->route('configuration.index');
                    }

                    return back()->with('error', 'Por el momento no se puede realizar la acción solicitada.');
                    break;
            }
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update status the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        try {

            $configuration = Configurations::where('id', $id)->first();

            if ($configuration->status == 1) {
                $configuration->status = 0;
            } else {
                $configuration->status = 1;
            }

            if ($configuration->save()) {

                return redirect()->route('configuration.index');
            }

            return back()->with('error', 'Por el momento no se puede realizar la acción solicitada.');
        } catch (QueryException $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function save_image($file, $name)
    {

        $name_standar = $name . date("YmdHis") . '.' . $file->extension();
        $path = 'images/storage/configuration/';
        $save_file = Storage::disk('public')->put($path, $file);

        if (!empty($path . $name_standar)) {
            if (file_exists(asset($path . $name_standar))) {
                unlink($path . $name_standar);
            }
        }

        $rename_file = Storage::disk('public')->move($save_file, $path . $name_standar);
        if ($rename_file) {
            if (!empty($save_file)) {
                if (file_exists(asset($save_file))) {
                    unlink($save_file);
                }
            }
        }

        return $path . $name_standar;
    }
}
