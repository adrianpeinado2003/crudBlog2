<?php

namespace App\Http\Controllers;

use App\Models\User;
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

        $user = User::find($request->id);
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect("userView");
    }

    public function editFromSession(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
        ]);

        $user = User::find(Auth::id());
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->save();

        return view("index");
    }

    public function delete(Request $request)
    {
        $request->validate([
            'id' => 'required|numeric',
        ]);

        $user = User::find($request->id);
        $user->delete();

        return redirect('userView');
    }

    public function view()
    {
        $users = User::all();
        return view('verUsuarios', compact('users'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'contraseña' => 'required',
        ]);

        $user = new User();
        $user->name = $request->nombre;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();

        return redirect('userView');
    }
}
