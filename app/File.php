<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Theme;
use App\Response;

class File extends Model
{
    protected $fillable = [
        'path','theme_id','response_id','id'
    ];

    public function getUrlPathAtribute(){

        return \Storage::url($this->path);
    }

    public function theme() {

        return $this->belongsTo(Theme::class);
    }
    public function response() {

        return $this->belongsTo(Response::class);
    }
    public function area(){

        return $this->belongsto(Area::class);
    }

    public function storeDataResponse($request, $id){

        DB::beginTransaction();
        try{
            //save image

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
        $newfile->response_id = $id;
        $newfile->save();

        DB::commit();

        return redirect()->back();

        }

        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()
                ->with('warning','Something Went Wrong!');
        }
    }
    public function storeDataTheme($request, $id){

        DB::beginTransaction();
        try{
            //save image

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
        $newfile->theme_id = $id;
        $newfile->save();

        DB::commit();

        return redirect()->back();

        }

        catch(\Exception $e)
        {
            DB::rollback();
            return redirect()->back()
                ->with('warning','Something Went Wrong!');
        }
    }
}