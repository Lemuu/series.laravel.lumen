<?php

namespace Tests\Unit;

use App\Serie;
use Tests\TestCase;
use App\Services\CreateSerie;
use App\Services\RemoveSerie;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RemoveSerieTest extends TestCase
{

    use RefreshDatabase;

    /** @var Serie */
    private $serie;

    public function setUp(): void
    {
        parent::setUp();
        $serieCreator = new CreateSerie();
        $nameSerie = 'Teste';
        $this->serie = $serieCreator->create($nameSerie, 1, 1);
    }

    public function testRemoveSerie()
    {
        $this->assertDatabaseHas('series', ['id' => $this->serie->id]);
        
        $removeSerie = new RemoveSerie();
        $nameSerie = $removeSerie->remove($this->serie->id);

        $this->assertIsString($nameSerie);
        $this->assertEquals('Teste', $nameSerie);
        $this->assertDatabaseMissing('series', ['id' => $this->serie->id]);
    }

}
