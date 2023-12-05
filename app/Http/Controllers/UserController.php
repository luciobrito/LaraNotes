<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function PaginaLogin(){
        if(!Auth::check()) 
        return view('login');
        else 
        return redirect('/home');
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
        $notasuser = Nota::where('id_user', Auth::user()->id)->get();
        if(Auth::check())
        return view('home', ['notas' => $notasuser]);
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
            ],
            ['email.required'=> 'Email obrigatório',
            'password.required' => 'Senha obrigatória']
        );
        if(auth()->attempt(['email'=>$incomingFields['email'],'password' => $incomingFields['password']])){
        $request->session()->regenerate();
        return redirect('/home');}
        else{
            return Redirect::back()
            //Retorna mensagem de erro
            ->withErrors(['email'=>'Email ou senha incorretos!'])
            //Retorna com o input do usuário
            ->withInput($request->all());
        }
    }
}
