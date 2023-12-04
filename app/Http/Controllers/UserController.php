<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function PaginaLogin(){
        if(Auth::check()) 
        return redirect('/home');
        else 
        return view('login');
    }
    public function PaginaCadastro(){
        if(Auth::check())
        return redirect('/home');
        else
        return view('cadastro');
    }
    public function Cadastrar(Request $request){
        $incomingFields = $request->validate(
            [
                'nome' => ['required', 'min:3'],
                'email' => ['required', 'email', Rule::unique('users','email')],
                'password' => ['required', 'min:4']
            ]
            
        );
        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect('/home');
    }
    public function Home(){
        if(Auth::check())
        return view('home');
        else
        return redirect('login');

    }
    public function Sair(){
        auth()->logout();
        return redirect('/login');
    }
    public function Login(Request $request){
        $incomingFields = $request->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );
        if(auth()->attempt(['email'=>$incomingFields['email'],'password' => $incomingFields['password']])){
        $request->session()->regenerate();
        return redirect('/home');}
        else{
            return Redirect::back()->withErrors([
                'email' => 'Email ou Senha incorretos!'
            ]);
        }
    }
}
