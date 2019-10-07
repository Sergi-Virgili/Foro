<?php

namespace App\Http\Controllers;

use App\Theme;
use App\Response;
use App\User;
use App\Area;
use Illuminate\Http\Request;
use Auth;

class ThemeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }

    public function index()
    {
        $temas = Theme::all();
        return view('foro.listaTemas', ['temas'=>$temas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $areas = Area::all();
        return view('foro.newTheme', ['areas' => $areas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $theme = new Theme();
        $theme->title = $request->title;
        $theme->area_id = $request->area_id;
        $theme->content = $request->content;
        $theme->user_id = Auth::user()->id;

        $theme->save();

        return redirect('foro/'.$theme->area_id.'/temas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function show(Theme $theme)
    {
        $responses = $theme->responses();
        return view('foro.showTheme',['theme' => $theme, 'responses' => $responses]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function edit(Theme $theme)
    {
        $areas = Area::all();
        return view('foro.updateTheme', ['theme' => $theme,
                                        'areas' => $areas]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Theme $theme)
    {
        $theme->update($request->all());
        return redirect('/foro/'.$theme->area_id.'/temas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Theme  $theme
     * @return \Illuminate\Http\Response
     */
    public function destroy(Theme $theme)
    {
        $theme->delete();
        return redirect('/foro/'.$theme->area_id.'/temas');
    }

    public function foroUser (User $user) {

        $responses = Response::getFromUser($user);
        $themes = Theme::getFromUser($user);
        //$themes = Theme::where('user_id' , $user->id)->get();
        return view('foro.foroUser', ['themes' => $themes,
                                    'user' => $user,
                                    'responses' => $responses]);
        
    }
}
