<?php

namespace App\Http\Controllers;

use App\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \View::make('foro.uploader');
    }

    public function store(Request $request)
    {
        
        $newfile = new File();

        //obtenemos el campo file definido en el formulario
        $file = $request->file('file');

        //obtenemos el nombre del archivo
        $nombrearchivo = $file->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('local')->put($nombrearchivo,  \File::get($file));

        $public_path = storage_path();
        $url =$public_path.'/foro/storage/'.$nombrearchivo;

        $newfile->imagen_nombre = $nombrearchivo;
        $newfile->path = $url;
        $newfile->response_id = $request->response_id;
        $newfile->save();

        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {
        $file->delete();
        return back();
    }
}

