<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Searchable\Search;
use App\User;
use App\Area;
use App\Theme;
use App\Response;

class areaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index','show','foroUser','search ');
    }
    
    public function index(){

        $areas=Area::all();
        // $area_name = Area::with('name')->get();
        return view ('foro.area', ['areas' => $areas]);
                    

    }

    public function create(){

        return view ('foro.createArea');

    }
    
    public function show(Area $area){

        $themes = $area->themes();
        return view('foro.showArea',['area' => $area]);

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

    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Area::class, 'name', 'description', 'id')
            ->registerModel(Theme::class, 'title', 'content','id')
            ->registerModel(Response::class, 'content', 'id')
            ->perform($request->input('query'));

        return view('foro.finder', compact('searchResults'));
    }

    public function foroUser (User $user) {

        return view('foro.foroUser', ['user' => $user]);
    }
}
