@extends('layout')

@section('header')
Temporadas de {{ $serie->name }}
@endsection

@section('content')

    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">

                <a href="/series/seasons/episodes/{{ $season->id }}">Temporada {{ $season->number }}</a>

                <span class="badge badge-secondary">{{ $season->episodesWatched()->count() }} / {{ $season->episodes->count() }}</span>

            </li>
        @endforeach
    </ul>

@endsection