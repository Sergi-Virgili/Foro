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
        $filePath = storage_path();
        $fileUrl = $filePath.'/foro/storage/'.$file->imagen_nombre;
        $file->delete();
        unlink($fileUrl);
        return back();
    }

    public function downloadFile ($file) {
        $public_path = storage_path();
        $url = $public_path.'/foro/storage/'.$file;
        if (File::exists($file))
        {
            return response()->download($url);
        }
        //si no se encuentra lanzamos un error 404.
        abort(404);
     
    }
}

