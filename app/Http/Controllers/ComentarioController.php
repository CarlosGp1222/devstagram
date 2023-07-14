<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function Store(Request $request, User $user, Post $post)
    {
        //validar
        $this->validate(request(), [
            'comentario' => 'required|max:255'
        ]);

        //guardar
        Comentario::create([
            'user_id' => auth()->user()->id,
            'post_id' => $post->id,
            'comentario' => $request->comentario
        ]);
    
        //redireccionar
        return back()->with('mensaje', 'Comentario agregado');
    }
}
