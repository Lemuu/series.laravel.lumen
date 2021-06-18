<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class RemoveSerie
{

    public function remove($serieId): string
    {

        DB::beginTransaction();

        $serie = Serie::find($serieId);
        $nameSerie = $serie->name;

        $this->removeSeason($serie);
        $serie->delete();

        DB::commit();

        return $nameSerie;
    }

    private function removeSeason($serie) 
    {
        $serie->seasons->each(function ($season) {
            $this->removeEpisodes($season);
            $season->delete();
        });
    }

    private function removeEpisodes($season)
    {
        $season->episodes->each(function ($episode) {
            $episode->delete();
        });
    }

}