<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Http\Controllers\BaseController;
use App\Models\Episodie;

class SeriesController extends BaseController
{

    public function __construct() {
        parent::__construct(Serie::class);
    }

    public function bySerie($serieId)
    {
        $episodies = Episodie::query()
            ->where('serie_id', $serieId)
            ->paginate();

        return $episodies;
    }

}