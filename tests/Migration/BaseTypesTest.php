<?php

namespace Clickbar\Magellan\Tests\Migration;

use Clickbar\Magellan\Schema\MagellanBlueprint;
use Clickbar\Magellan\Tests\TestCase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BaseTypesTest extends TestCase
{
    use RefreshDatabase;

    public function testGeometryIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeometry('geometry')
        );

        $this->assertEquals('create table "test" ("geometry" public.GEOMETRY(geometry,4326) not null)', $queryLog['query']);
    }

    public function testGeometryWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeometry('geometry', 52286)
        );

        $this->assertEquals('create table "test" ("geometry" public.GEOMETRY(geometry,52286) not null)', $queryLog['query']);
    }

    public function testGeographyIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeography('geography')
        );

        $this->assertEquals('create table "test" ("geography" public.GEOGRAPHY(geometry,4326) not null)', $queryLog['query']);
    }

    public function testGeographyWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeography('geography', 4267)
        );

        $this->assertEquals('create table "test" ("geography" public.GEOGRAPHY(geometry,4267) not null)', $queryLog['query']);
    }
}
