<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\UserTest1;
use App\Post;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp;
use function MongoDB\BSON\toJSON;


class YoutubeController extends Controller
{
    public function index() {
        $data = User::all();

        return $data;
    }

    public function movie($nameOfSearch) {


        $client = new GuzzleHttp\Client();
        $res = $client->get('http://www.omdbapi.com/?t='.$nameOfSearch.'&apikey=d1c8309b');
        echo $res->getStatusCode(); // 200
        echo $res->getBody(); // { "type": "User", ....


    }

public function find(Request $request){


}
}
