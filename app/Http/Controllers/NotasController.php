<?php

namespace App\Http\Controllers;

use App\Models\Nota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class NotasController extends Controller
{
    public function CriarNota(Request $request){
        $input = $request->validate([
            'titulo' => ['nullable'],
            'corpo' => 'required',
            'id_user',
            'id_pasta'
        ]);
        $input['id_user'] = Auth::user()->id;
        $input['titulo'] = $input['titulo'] ?? 'Nota sem titulo';

        Nota::create($input);
        return Redirect::back();
        
    }
}
