<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Theme;
use App\Response;

class Image extends Model
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

    public function storeImageResponse($request, $id){

        DB::beginTransaction();
        try{
            //save image

        $newimage = new Image();

        //obtenemos el campo file definido en el formulario
        $image = $request->file('image');

        //obtenemos el nombre del archivo
        $nombrearchivo = $image->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('local')->put($nombrearchivo,  \File::get($image));

        $public_path = storage_path();
        $url =$public_path.'/foro/storage/'.$nombrearchivo;

        $newimage->image_name = $nombrearchivo;
        $newimage->path = $url;
        $newimage->response_id = $id;
        $newimage->save();

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
    public function storeImageTheme($request, $id){

        DB::beginTransaction();
        try{
            //save image

        $newimage = new Image();

        //obtenemos el campo file definido en el formulario
        $image = $request->file('image');

        //obtenemos el nombre del archivo
        $nombrearchivo = $image->getClientOriginalName();

        //indicamos que queremos guardar un nuevo archivo en el disco local
        Storage::disk('local')->put($nombrearchivo,  \File::get($image));

        $public_path = storage_path();
        $url =$public_path.'/foro/storage/'.$nombrearchivo;

        $newimage->image_name = $nombrearchivo;
        $newimage->path = $url;
        $newimage->theme_id = $id;
        $newimage->save();

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