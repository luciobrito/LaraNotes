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
    public function DeletarNota(Request $request){
        $input = $request->validate([
            'notaid' => 'required'
        ]);
        $nota = Nota::find($input['notaid'])->first();
        $deletarNota = $nota->delete();
        if($deletarNota)
        return Redirect::back()->withErrors(['sucesso' => 'Nota deletada com sucesso!' ]);
        else
        return Redirect::back()->withErrors(['falha' => 'Houve uma falha, a nota não foi deletada.']);

    }
}
