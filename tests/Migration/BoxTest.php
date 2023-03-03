<?php

namespace Clickbar\Magellan\Tests\Migration;

use Clickbar\Magellan\Schema\MagellanBlueprint;
use Clickbar\Magellan\Tests\TestCase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BoxTest extends TestCase
{
    use RefreshDatabase;

    public function testBox2DIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanBox2D('box')
        );

        $this->assertEquals('create table "test" ("box" public.box2d not null)', $queryLog['query']);
    }

    public function testBox3DIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanBox3D('box')
        );

        $this->assertEquals('create table "test" ("box" public.box3d not null)', $queryLog['query']);
    }
}
