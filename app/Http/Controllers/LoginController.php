<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function tudo()
    {
        return User::all();
    }

    public function novo()
    {
        return view('cadastro');
        
    }

    public function cadastrar(Request $request)
    {
        // return $request->all();

        $user = new User();
        $user->name = $request->input('nome');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        //return redirect()->route('login');
        return redirect()->route('logout');
    }

    public function autorizar(Request $request)
    {
        // return $request->all();
        $login = [
            'email' => $request->input('email'),
            'password' => $request->input('password') 
        ];

        if (Auth::attempt($login, false)) {
            return redirect()->route('home');
        } else {
            return 'Nao autorizado.';
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function search(Request $request)
    { 


        $query = User::all()->where('name', '=', $request->search);

        if($request->search == ''){
            return User::all();
        }

        //$todos = $query->paginate();
        //$filtrado = User::query()->where('name', '=', $request->search );

    

        //echo($query);
        return $query;
        //return $filtrado->paginate();
        //return User::all();
    } 
}

