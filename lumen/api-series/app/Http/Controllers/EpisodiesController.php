<?php

namespace App\Http\Controllers;

use App\Models\Episodie;
use App\Http\Controllers\BaseController;

class EpisodiesController extends BaseController
{

    public function __construct() {
        parent::__construct(Episodie::class);
    }
    
}