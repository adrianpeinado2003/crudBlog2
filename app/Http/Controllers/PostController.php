<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'contenido' => 'required',
            'categoria' => 'required|numeric',
        ]);

        $post = new Post();
        $post->nombre = $request->nombre;
        $post->contenido = $request->contenido;
        $post->id_categoria = $request->categoria;
        $post->id_autor = Auth::id();
        $post->save();

        return redirect("postView");
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        $post = Post::find($request->id);
        $post->delete();

        return redirect("postView");
    }

    public function view()
    {
        $posts = Post::all();
        return view('verPosts', compact('posts'));
    }

    public function edit(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'contenido' => 'required',
            'categoria' => 'required|numeric',
            'id' => 'required|numeric',
        ]);

        $post = Post::find($request->id);
        $post->nombre = $request->nombre;
        $post->contenido = $request->contenido;
        $post->id_categoria = $request->categoria;
        $post->save();

        return redirect("postView");
    }

    public function verCategoriaPosts(Request $request){
        $id = $request->input('id');
        $posts = Post::where('id_categoria', $id)->get();
        return view('verPosts', compact('posts'));
    }

    public function verAutorPosts(Request $request){
        $id = $request->input('id');
        $posts = Post::where('id_autor', $id)->get();
        return view('verPosts', compact('posts'));
    }

    public function verMisPosts(){
        $posts = Post::where('id_autor', Auth::id())->get();
        return view('verPosts', compact('posts'));
    }

}
