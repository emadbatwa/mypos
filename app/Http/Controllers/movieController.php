<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp;
use Illuminate\Support\Facades\Input;
use App\Post;
use App\Movie;


class movieController extends Controller
{
    //
    public function index() {

        return view('movie');
    }
    public function find() {

        $name = Input::get('name');

        $dataReturned = $this->movie($name);
       //return $dataReturned;
        //return view('info',['dataReturned' => $dataReturned]);
      return view('info')->with('dataReturned',$dataReturned);
       // dd($dataReturned);


    }


    public function movie($nameOfSearch) {


        $client = new GuzzleHttp\Client();
        $data = $client->get('http://www.omdbapi.com/?s='.$nameOfSearch.'&apikey=726b7d83');
        $data = json_decode($data->getBody(), true);
//        $data = array('Title' => $data['Title'],
//            'Year' => $data['Year'],
//            );
        //$data = json_encode($data);

       //dd($data);
        return $data;





    }

    public function insert(){
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('posts')->with('success','Post Created ');
    }
    public function save(Request $request) {
        $Movie = new Movie();
        $Movie->title = 'test';
        $Movie->poster = 'poster test';
        $Movie->imdbID = $request->input('imdbid');
        $Movie->save();
        return redirect()->back()->with('success','Movie Add To MY List ');
    }
}
