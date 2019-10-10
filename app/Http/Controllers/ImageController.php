<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
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

    public function show(Image $image)
    {
        //
    }

    public function update(Request $request, Image $image)
    {
        //
    }

    public function destroy(Image $image)
    {
        $imagePath = storage_path();
        $imageUrl = $imagePath.'/foro/storage/'.$image->image_name;
        $image->delete();
        unlink($imageUrl);
        return back();
    }
}
