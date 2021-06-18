@extends('layout')

@section('header')
Adicionar Série
@endsection

@section('content')

    @include('errors', ['errors' => $errors])

    <form method="POST">
        @csrf
        <div class="row">
            <div class="col col-8">
                <label for="name">Nome</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>

            <div class="col col-2">
                <label for="n_seasons">Nº de Temporadas</label>
                <input type="number" class="form-control" name="n_seasons" id="n_seasons">
            </div>

            <div class="col col-2">
                <label for="episodes_by_season">Ep. por Temporada</label>
                <input type="number" class="form-control" name="episodes_by_season" id="episodes_by_season">
            </div>
        </div>

        <button class="btn btn-primary mt-2">Adicionar</button>
    </form>
@endsection