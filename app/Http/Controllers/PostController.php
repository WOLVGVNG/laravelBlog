<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Session;
use Illuminate\Support\Facades\Auth;
use Gate;

class PostController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('isUser')){
            return redirect()->route('login');
        }

        $posts = Post::orderBy('id', 'desc')->paginate(10);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::allows('isUser')){
            return redirect()->route('login');
        }

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
        if(Gate::allows('isUser')){
            return redirect()->route('login');
        }

        $request->validate([
            'title' => 'required|max:191',
            'slug' => 'required|alpha_dash|min:5|max:191|unique:posts,slug',
            'body' => 'required',
        ]);

        $post = new Post;

        $post->title = $request->title;
        $post->slug = $request->slug;
        $post->body = $request->body;

        $post->save();

        Session::flash('success', 'The blog post was successfully save!');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Gate::allows('isUser')){
            return redirect()->route('login');
        }

        $post = Post::find($id);

        return view('posts.show')->withPost($post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Gate::allows('isUser')){
            return redirect()->route('login');
        }

        $post = Post::find($id);

        return view('posts.edit')->withPost($post);
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
        if(Gate::allows('isUser')){
            return redirect()->route('login');
        }

        $post = Post::find($id);

        if($request->input('slug') == $post->slug){
            $request->validate([
                'title' => 'required|max:191',
                'body' => 'required',
            ]); 
        }

        else{
            $request->validate([
                'title' => 'required|max:191',
                'slug' => 'required|alpha_dash|min:5|max:191|unique:posts,slug',
                'body' => 'required',
            ]);
        } 

        $post->title = $request->input('title');
        $post->slug = $request->slug;
        $post->body = $request->input('body');
        $post->save();

        Session::flash('success', 'This post was successfully saved.');

        return redirect()->route('posts.show', $post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Gate::allows('isUser')){
            return redirect()->route('login');
        }

        $post = Post::find($id);
        
        $post->delete();

        Session::flash('success', 'The post was successfully deleted.');

        return redirect()->route('posts.index');
    }
}
