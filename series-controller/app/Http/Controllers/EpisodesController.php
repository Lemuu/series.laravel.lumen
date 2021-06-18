<?php

namespace App\Http\Controllers;

use App\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{

    public function index($seasonId, Request $request)
    {
        $season = Season::find($seasonId);
        $serie = $season->serie;
        $episodes = $season->episodes;
        $message = $request->session()->get('message');

        return view('episodes.index', compact('season', 'serie', 'episodes', 'message'));
    }

    public function watch($seasonId, Request $request)
    {
        $season = Season::find($seasonId);
        $watcheds = $request->watcheds;

        $season->episodes->each(function ($episode) use ($watcheds) {
            $episode->watched = in_array($episode->id, $watcheds);
        });
        $season->push();

        $request->session()->flash('message', "Episódios marcados como assistidos.");

        return redirect()->back();
    }

}
