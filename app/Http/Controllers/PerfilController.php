<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class PerfilController extends Controller
{
    //proteger
    public function __construct()
    {
        $this->middleware('auth');
    }
    // index
    public function index()
    {
        return view('perfil.index');
    }

    // store
    public function store(Request $request){
        $request->request->add([
            'username' => Str::slug($request->username),
        ]);

        $this->validate($request, [
            'username' => ['required', 'unique:users,username,' . auth()->user()->id, 'min:3', 'max:20', 'not_in:twitter,facebook,instagram,tiktok'],
            'email' => ['required', 'unique:users,email,' . auth()->user()->id, 'email'],

        ]);

        if ($request->imagen) {
            $imagen = $request->file('imagen');

            $nombreImagen = Str::uuid() . '.' . $imagen->extension();

            $imagenServidor = Image::make($imagen)->fit(1000, 1000);

            $imagenPath = public_path('perfiles') . '/' . $nombreImagen;

            $imagenServidor->save($imagenPath);
        }


        //guardar

        $usuario = User::find(auth()->user()->id);
        $usuario->username = $request->username;
        $usuario->email = $request->email;
        $usuario->imagen = $nombreImagen ?? auth()->user()->imagen ?? null;
        if($request->password){
            if(!auth() -> attempt(['email' => auth() -> user() -> email,'password' => $request -> password])){
                return back() -> with('mensaje', 'Password Incorrecta');
            } 
            //validate
            $this->validate($request, [
                'newpassword' => 'required|min:6',
            ]);
            $usuario->password = Hash::make($request->newpassword);
        }
        // dd($request->password);
        
        $usuario->save();

        return redirect()->route('posts.index', $usuario->username);
    }
}
