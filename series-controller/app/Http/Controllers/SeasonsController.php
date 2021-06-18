<?php

namespace App\Http\Controllers;

use App\Serie;

class SeasonsController extends Controller
{

    public function index($serieId)
    {
        $serie = Serie::find($serieId);
        $seasons = $serie->seasons;

        return view('seasons.index', compact('serie', 'seasons'));
    }

}
