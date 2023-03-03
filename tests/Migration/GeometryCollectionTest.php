<?php

namespace Clickbar\Magellan\Tests\Migration;

use Clickbar\Magellan\Schema\MagellanBlueprint;
use Clickbar\Magellan\Tests\TestCase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class GeometryCollectionTest extends TestCase
{
    use RefreshDatabase;

    public function testGeometryCollectionIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeometryCollection('geometry_collection')
        );

        $this->assertEquals('create table "test" ("geometry_collection" public.GEOMETRY(GEOMETRYCOLLECTION,4326) not null)', $queryLog['query']);
    }

    public function testGeometryCollectionWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeometryCollection('geometry_collection', 52286)
        );

        $this->assertEquals('create table "test" ("geometry_collection" public.GEOMETRY(GEOMETRYCOLLECTION,52286) not null)', $queryLog['query']);
    }

    public function testGeometryCollectionMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeometryCollectionM('geometry_collection')
        );

        $this->assertEquals('create table "test" ("geometry_collection" public.GEOMETRY(GEOMETRYCOLLECTIONM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryCollectionMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeometryCollectionM('geometry_collection', 52286)
        );

        $this->assertEquals('create table "test" ("geometry_collection" public.GEOMETRY(GEOMETRYCOLLECTIONM,52286) not null)', $queryLog['query']);
    }

    public function testGeometryCollectionZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeometryCollectionZ('geometry_collection')
        );

        $this->assertEquals('create table "test" ("geometry_collection" public.GEOMETRY(GEOMETRYCOLLECTIONZ,4326) not null)', $queryLog['query']);
    }

    public function testGeometryCollectionZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeometryCollectionZ('geometry_collection', 52286)
        );

        $this->assertEquals('create table "test" ("geometry_collection" public.GEOMETRY(GEOMETRYCOLLECTIONZ,52286) not null)', $queryLog['query']);
    }

    public function testGeometryCollectionZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeometryCollectionZM('geometry_collection')
        );

        $this->assertEquals('create table "test" ("geometry_collection" public.GEOMETRY(GEOMETRYCOLLECTIONZM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryCollectionZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint|MagellanBlueprint $table) => $table->magellanGeometryCollectionZM('geometry_collection', 52286)
        );

        $this->assertEquals('create table "test" ("geometry_collection" public.GEOMETRY(GEOMETRYCOLLECTIONZM,52286) not null)', $queryLog['query']);
    }
}
