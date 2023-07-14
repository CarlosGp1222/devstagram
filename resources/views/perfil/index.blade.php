@extends('layouts.app')

@section('titulo')
    Editar Perfil: {{ auth()->user()->username }}
@endsection

@section('contenido')
    <div class="md:flex md:justify-center">
        <div class="md:w-1/2 bg-white shadow p-6">
            <form class="mt-10 md:mt-0" method="POST" action="{{ route('perfil.store') }}"  enctype="multipart/form-data">
                @csrf
                @if (session('mensaje'))
                    <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">
                        {{ session('mensaje') }}
                    </p>
                @endif
                <div class="mb-5 ">
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold">
                        Username
                    </label>
                    <input 
                        type="text" 
                        name="username" 
                        id="username" 
                        placeholder="Tu Username"
                        class="border p-3 w-full rounded-lg @error('username')
                            border-red-500
                            border-2
                        @enderror"
                        value="{{ auth()->user()->username }}"
                    >

                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message}}</p>
                    @enderror
                </div>

                <div class="mb-5 ">
                    <label for="imagen" class="mb-2 block uppercase text-gray-500 font-bold">
                        Imagen Perfil
                    </label>
                    <input 
                        type="file" 
                        name="imagen" 
                        id="imagen" 
                        value=""
                        class="border p-3 w-full rounded-lg "
                        accept=".jpg, .jpeg, .png"
                    >
                </div>

                <div class="mb-5 ">
                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">Email</label>
                    <input 
                        type="email" 
                        name="email" 
                        id="email" 
                        placeholder="Tu email de registro"
                        class="border p-3 w-full rounded-lg @error('email')
                        border-red-500
                        border-2
                        @enderror"
                        value="{{ auth()->user()->email }}"
                    >
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message}}</p>
                    @enderror
                </div>
                <div class="mb-5 ">
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        id="password" 
                        placeholder="Tu password actual"
                        class="border p-3 w-full rounded-lg @error('password')
                        border-red-500
                        border-2
                        @enderror"
                    >
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message}}</p>
                    @enderror
                </div>
                <div class="mb-5 ">
                    <label for="newpassword" class="mb-2 block uppercase text-gray-500 font-bold">Password</label>
                    <input 
                        type="password" 
                        name="newpassword" 
                        id="newpassword" 
                        placeholder="Tu password nuevo"
                        class="border p-3 w-full rounded-lg @error('newpassword')
                        border-red-500
                        border-2
                        @enderror"
                    >
                    @error('newpassword')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message}}</p>
                    @enderror
                </div>
                <input 
                    type="submit"
                    value="Guardar cambios"
                    class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase w-full p-3 text-white font-bold rounded-lg"
                >
            </form>
        </div>
    </div>
@endsection