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

        $nombre = $request->input('nombre');
        $contenido = $request->input('contenido');
        $id_categoria = $request->input('categoria');

        DB::table('post')->insert(
            array(
                'id' => '0',
                'nombre' => $nombre,
                'contenido' => $contenido,
                'id_categoria' => $id_categoria,
                'id_autor' => Auth::id(),
            )
        );
        return redirect("postView");
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        $id = $request->input('id');

        DB::table('post')
            ->where('id', $id)
            ->delete();

        return redirect("postView");
    }

    public function view()
    {
        $posts = Post::all();
        return view('verPosts', compact('posts'));
    }

    public function edit(Request $request)
    {
        $post = Post::find($id);

        $post->nombre = $reuqest->nombre;

        $post->save();

        $request->validate([
            'nombre' => 'required',
            'contenido' => 'required',
            'categoria' => 'required|numeric',
            'id' => 'required|numeric',
        ]);

        $nombre = $request->input('nombre');
        $contenido = $request->input('contenido');
        $id_categoria = $request->input('categoria');
        $id = $request->input('id');

        DB::table('post')
            ->where('id', $id)
            ->update(['nombre' => $nombre, 'contenido' => $contenido, 'id_categoria' => $id_categoria]);

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

}
