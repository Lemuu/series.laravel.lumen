<?php

namespace Tests\Unit;

use App\Serie;
use Tests\TestCase;
use App\Services\CreateSerie;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateSerieTest extends TestCase
{

    use RefreshDatabase;

    public function testCreateSerie()
    {
        $serieCreator = new CreateSerie();

        $nameSerie = 'Teste';

        $serie = $serieCreator->create($nameSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serie);
        $this->assertDatabaseHas('series', ['name' => $nameSerie]);
        $this->assertDatabaseHas('seasons', ['serie_id' => $serie->id, 'number' => 1]);
        $this->assertDatabaseHas('episodes', ['number' => 1]);
    }

}
