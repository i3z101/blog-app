<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostValidation;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function __construct()
     {
         $this->middleware('auth')->except(['index','show']);
     }


    public function index()
    {   
        $x= Post::orderBy('created_at', 'DESC')->get();

        // return view('blog.index')->with('posts', User::orderBy('created_at', 'DESC')->get());

        return view('blog.index')->with('posts', Post::orderBy('created_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $createValidation= new PostValidation();
        $request->validate($createValidation->rules(true));

        $imageName= uniqid() . "_" . $request->title . "." . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        Post::create([
            'title' => $request->input('title'),
            'body'  => $request->input('body'),
            'image_path' => $imageName,
            'user_id'   => auth()->user()->id
        ]);

        return redirect('/blog')->with('message', 'Your post has been published successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd( Post::where('id', $id)->get());
        return view('blog.show')->with('post', Post::where('id', $id)->get());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('blog.edit')->with('post', Post::all()->where('id', $id));
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
        $updateValidation= new PostValidation();
        $request->validate($updateValidation->rules(false));
        $imageName='';
        if($request->image){
            $imageName= uniqid() . "_" . $request->title . "." . $request->image->extension();

            $request->image->move(public_path('images'), $imageName);

            Post::where('id', $id)
                ->update([
                'title' => $request->input('title'),
                'body' => $request->input('body'),
                'image_path' => $imageName
            ]);
        }else{
            Post::where('id', $id)
                ->update([
                'title' => $request->input('title'),
                'body' => $request->input('body')
            ]);
        }

        return redirect('/blog')->with('message', 'Your post has been updated successfully');

       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id', $id)->delete();
        return redirect('/blog')->with('message', 'Your post has been deleted successfully');

    }
}
