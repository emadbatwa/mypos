<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Twitter;

app()->singleton('Example', function () {
    return new App\Example;
});

Route::get('/twitter',function (Twitter $twitter){
    dd($twitter);
});

Route::get('/abs', function (){
    dd(app('Example'),app('Example'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/', 'PagesControllers@index');
//Route::get('/', 'CommentController@index');

Route::get('/', function () {
    $command = escapeshellcmd('test.py');
    $output = shell_exec($command);
    dd($output);
});

Route::get('/about', 'PagesControllers@about');
Route::get('/services', 'PagesControllers@services');
Route::resource('posts','PostController');

//Route::get('/search', 'YoutubeController@find');
Route::get('/find', 'movieController@find');



Route::get('/search','movieController@index')->name('movie');
Route::post('/savemovie/','movieController@save');





