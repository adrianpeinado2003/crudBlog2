<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function editFromAdmin(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'id' => 'required|numeric',
        ]);

        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        $id = $request->input('id');

        DB::table('users')
            ->where('id', $id)
            ->update(['name' => $nombre, 'email' => $email, 'password' => $password]);

        return redirect("userView");
    }

    public function editFromSession(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        $nombre = $request->input('nombre');
        $email = $request->input('email');

        DB::table('users')
            ->where('id', Auth::id())
            ->update(['name' => $nombre, 'email' => $email]);

        return view("index");
    }

    public function deleteFromAdmin(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        $id = $request->input('id');

        DB::table('users')
            ->where('id', $id)
            ->delete();

        return redirect('userView');
    }

    public function view()
    {
        return view("/verUsuarios")->with([
            "users" =>
            DB::table('users')
                ->select('*')
                ->get()
        ]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'contraseña' => 'required',
        ]);

        $nombre = $request->input('nombre');
        $email = $request->input('email');
        $password = Hash::make($request->input('contraseña'));

        DB::table('users')->insert(
            array(
                'id' => '0',
                'name' => $nombre,
                'email' => $email,
                'password' => $password,
            )
        );

        return redirect('userView');
    }
}
