<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Area;
use App\Theme;
use App\Response;

class FinderController extends Controller
{

    public function find(Request $request)
    {
        $input = $request->all();

        if($request->get('find')){
            $found = Area::where("name", "LIKE", "%{$request->get('find')}%")
                ->paginate(5);
        }else{
    $found = Area::paginate(5);
        }

        return view('foro.finder')->with('find', $found);
    }
}
?>