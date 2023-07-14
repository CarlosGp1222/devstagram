@extends('layouts.app')

@section('titulo')
    Pagina Principal
@endsection

@section('contenido')
    {{-- <x-listar-post>
        <x-slot name="titulo">
            <header>Esto es un header</header>
        </x-slot>
        <h1>Mostrando post desde slot</h1>
    </x-listar-post> --}}
    <x-listar-post :posts="$posts"/>

    {{-- 
        @if ($posts->count())
        <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 p-10">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post->titulo, 'user' => $post->user]) }}">
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del post {{ $post->titulo }}">
                    </a>

                </div>
            @endforeach
        </div>
    @else
        <p class="text-center">No hay posts</p>
    @endif    
    --}}
@endsection
