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

        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect('categoriaView');
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        $categoria = Categoria::find($request->id);
        $categoria->delete();

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

        $categoria = Categoria::find($request->id);
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect('categoriaView');
    }
}
