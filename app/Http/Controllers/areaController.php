<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Area;

class areaController extends Controller
{
    public function index(){

        $areas=Area::all();
        return view ('foro.area', ['areas' => $areas]);
                    

    }

    public function create(){

        return view ('foro.createArea');

    }
    
    public function show(Area $area){

        return  view('area.showArea',['area' => $area]);

    }

    public function store(request $request){

        $this->validate($request, ['id', 'name'=>'required', 'description'=>'required']);
        Area::create($request->all()); //->$area = new area(), ,guardar ->save()
        return redirect('/foro');
    }

    public function edit(Area $area){

        return view ('foro.editArea', compact('area', $area));
    
    }

    public function update(Request $request, Area $area ){
        // $request->validate(['name' => 'required', 'description' => 'required']);
        // $area->name = $request->get('name');
        // $area->description = $request->get('description');
     //   $share = Share::find($id);
    //   $share->save();
        $area->update($request->all());
        return redirect('/foro');
    }

    public function destroy(Area $area){
        $area->delete();
        return redirect('/foro');
    }
}
