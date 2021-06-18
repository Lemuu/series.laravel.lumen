@extends('layout')

@section('header')
Episódios da {{ $season->number }}º temporada de {{ $serie->name }}
@endsection

@section('content')

    @include('message', ['message' => $message])

    <form action="/series/seasons/episodes/{{ $season->id }}/watch" method="POST">
        @csrf
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episode->number }}
                    <input 
                        type="checkbox" 
                        name="watcheds[]" value="{{ $episode->id }}"
                        {{ $episode->watched ? 'checked' : '' }}
                    >
                </li>
            @endforeach
        </ul>
    
        @auth
            <button class="btn btn-primary mt-2 mb-2">Salvar</button>
        @endauth
    </form>

@endsection