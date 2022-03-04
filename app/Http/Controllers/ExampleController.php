<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExampleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function uploadimages(Request $request)
    {
        $image_name = $request->image_name;
        if(!empty($image_name)){
         unlink(base_path() . '/public' . '/images/' .  $image_name);  
         return; 
        }
        $file = $request->file('file');
        $img = \Image::make($file);
        $name = $file->getClientOriginalName();
        $img->save(app()->basePath('public/images/').$name,10);
    }
}
