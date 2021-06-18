<?php

namespace Tests\Unit;

use App\Episode;
use App\Season;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SeasonTest extends TestCase
{

    /** @var Season */
    private $season;

    protected function setUp(): void
    {
        parent::setUp();
        $season = new Season();
        $ep1 = new Episode();
        $ep1->watched = true;

        $ep2 = new Episode();
        $ep2->watched = false;

        $ep3 = new Episode();
        $ep3->watched = true;

        $season->episodes->add($ep1);
        $season->episodes->add($ep2);
        $season->episodes->add($ep3);

        $this->season = $season;
    }

    public function testBuscaPorEpisodiosAssistidos()
    {
        $episodesWatched = $this->season->episodesWatched();

        $this->assertCount(2, $episodesWatched);
        
        foreach ($episodesWatched as $episode) {
            $this->assertTrue($episode->watched);
        }
    }

    public function testBuscaTodosOsEpisodios()
    {
        $episodes = $this->season->episodes;

        $this->assertCount(3, $episodes);
    }

}
