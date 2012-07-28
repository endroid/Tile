<?php

namespace Endroid\Tests\Tile;

use Endroid\Tile\Tile;

class TileTest extends \PHPUnit_Framework_TestCase
{
    public function testCreateTile()
    {
        $tile = new Tile();
        $tile->setText("Life is too short to be generating tiles");
        $tile->setSize(300);
        $tile->create();

        $this->assertTrue(true);
    }
}
