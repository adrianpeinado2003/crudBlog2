<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
        ]);

        $nombre = $request->input('nombre');

        DB::table('categoria')->insert(
            array(
                'id' => '0',
                'nombre' => $nombre,
            )
        );

        return redirect('categoriaView');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        $id = $request->input('id');

        DB::table('categoria')
            ->where('id', $id)
            ->delete();

        return redirect('categoriaView');
    }

    public function view()
    {
        $categorias = Categoria::all();
        return view('verCategorias', compact('categorias'));
    }

    public function viewPosts(Request $request)
    {
        $id = $request->input('id');
        $posts = Post::where('id_categoria', $id)->get();
        return view('verPosts', compact('posts'));
    }

    public function edit(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'id' => 'required|numeric',
        ]);

        $nombre = $request->input('nombre');
        $id = $request->input('id');

        DB::table('categoria')
            ->where('id', $id)
            ->update(['nombre' => $nombre]);

        return redirect('categoriaView');
    }
}
