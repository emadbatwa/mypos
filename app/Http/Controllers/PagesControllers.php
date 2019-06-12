<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesControllers extends Controller
{

    public function index(){
        $title = 'Welcome To Laravel ! ';
        return view('Pages.index',compact('title'));
    }

    public function about(){
        $title = 'Abut Us !';
        return view('Pages.About')->with('title',$title);
    }

    public function services(){
        $data = array(
            'title' => 'Services !!',
            'services' => ['Web Design','Programmer','SEO'],
        );
        return view('Pages.services')->with($data);
    }


}
