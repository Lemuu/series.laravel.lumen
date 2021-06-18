<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Services\CreateSerie;
use App\Services\RemoveSerie;

class SeriesController extends Controller
{

    public function index(Request $request) {
        $series = Serie::query()
            ->orderBy('name')
            ->get();
        $message = $request->session()->get('message');
    
        return view('series.index', compact('series', 'message'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request, CreateSerie $createSerie)
    {
        $serie = $createSerie->create($request->name, $request->n_seasons, $request->episodes_by_season);

        $request->session()->flash('message', "Série {$serie->name} e suas temporadas e episódias, inserida com sucesso.");
        return redirect()->route('series.index');
    }

    public function destroy(Request $request, RemoveSerie $removeSerie)
    {
        $nameSerie = $removeSerie->remove($request->id);

        $request->session()->flash('message', "Série $nameSerie removida com sucesso.");
        return redirect()->route('series.index');
    }

    public function editName($id, Request $request)
    {
        $newName = $request->name;
        $serie = Serie::find($id);
        $serie->name = $newName;
        $serie->save();

        return redirect()->route('series.index');
    }

}