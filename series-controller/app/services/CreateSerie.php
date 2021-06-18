<?php

namespace App\Services;

use App\Serie;
use Illuminate\Support\Facades\DB;

class CreateSerie
{

    public function create($nameSerie, $numberSeason, $numberEpisodeBySeason): Serie
    {
        DB::beginTransaction();

        $serie = Serie::create(['name' => $nameSerie]);
        $this->createSeasons($serie, $numberSeason, $numberEpisodeBySeason);

        DB::commit();

        return $serie;
    }

    private function createSeasons($serie, $numberSeason, $numberEpisodeBySeason)
    {
        for ($i = 1; $i <= $numberSeason; $i++) {
            $season = $serie->seasons()->create(['number' => $i]);
            $this->createEpisodies($season, $numberEpisodeBySeason);
        }
    }

    private function createEpisodies($season, $numberEpisodeBySeason)
    {
        for ($i = 1; $i <= $numberEpisodeBySeason; $i++) {
            $season->episodes()->create(['number' => $i]);
        }
    }

}