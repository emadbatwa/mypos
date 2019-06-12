<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;
use DB;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth',['except' => ['index','show']]);
    }
    public function index()
    {
          // this using laravel syntax
         // this using sql syntax ( use DB )
        //$posts = DB::select('select * from posts ');
        //$post = Post::where('title','Post Tow')->get();
        //return $post;
         $posts = Post::orderBy('created_at','desc')->paginate(10);

        return view('posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required' ,
            'body' => 'required',
            'cover_image' => 'image|nullable|max:1999'
    ]);

        //Handle File Upload

        if($request->hasFile('cover_image')) {
            //Get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // Get just extension
            $extenstion = $request->file('cover_image')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extenstion;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }
        else {
            $fileNameToStore = 'noimage.jpg';
        }
        // create post ( insert into database)
        $post = new Post();
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;
        $post->save();
        return redirect('posts')->with('success','Post Created ');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.show')->with('posts',$posts);


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error','Unautorize page');
        }
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required' ,
            'body' => 'required',
        ]);


        //Handle File Upload

        if($request->hasFile('cover_image')) {
            //Get file name with extension
            $fileNameWithExt = $request->file('cover_image')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // Get just extension
            $extenstion = $request->file('cover_image')->getClientOriginalExtension();
            // file name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extenstion;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images',$fileNameToStore);
        }


        // create post ( insert into database)
        $post =  Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image')) {
            $post->cover_image = $fileNameToStore;
        }
        $post->save();
        return redirect('posts')->with('success','Post Updated ');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if(auth()->user()->id != $post->user_id){
            return redirect('/posts')->with('error','Unautorize page');
        }
        if($post->cover_image != 'noimage.jpg') {
            //Delete image
            Storage::delete('public/cover_images/'.$post->cover_image);

        }
        $post->delete();
        return redirect('posts')->with('success','Post Deleted! ');


    }

    public function insert(Request $request) {

        print_r($request->input());

    }
}
