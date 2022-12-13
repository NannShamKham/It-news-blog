<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nette\Utils\Image;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function test(){
        return view('test');
    }
    public function upload(Request $request){
       $img = \Intervention\Image\Facades\Image::make($request->file('photo'));
       $img->resize(300,null,function ($constraint){
           $constraint->aspectRatio();
       });
       $img->brightness(10);
       $img->save("storage/aa.jpg");
//       $img->save("storage/".uniqid().".jpg",100,"jpg");
       return $img->response('jpg');
    }
}
