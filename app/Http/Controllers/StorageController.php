<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StorageController extends Controller
{
    public function index()
    {
        return \View::make('foro.uploader');
    }
    public function save(Request $request)
    {
 
       //obtenemos el campo file definido en el formulario
       $file = $request->file('file');
 
       //obtenemos el nombre del archivo
       $nombrearchivo = $file->getClientOriginalName();
 
       //indicamos que queremos guardar un nuevo archivo en el disco local
       Storage::disk('local')->put($nombrearchivo,  \File::get($file));
 
       return back();
    }
}
