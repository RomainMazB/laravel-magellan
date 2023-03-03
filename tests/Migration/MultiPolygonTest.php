<?php

namespace Clickbar\Magellan\Tests\Migration;

use Clickbar\Magellan\Tests\TestCase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MultiPolygonTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Geometry
     */

    public function testGeometryMultiPolygonIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygon('multi_polygon')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOMETRY(MULTIPOLYGON,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPolygonWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygon('multi_polygon', 52286)
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOMETRY(MULTIPOLYGON,52286) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPolygonMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonM('multi_polygon')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOMETRY(MULTIPOLYGONM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPolygonMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonM('multi_polygon', 52286)
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOMETRY(MULTIPOLYGONM,52286) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPolygonZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonZ('multi_polygon')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOMETRY(MULTIPOLYGONZ,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPolygonZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonZ('multi_polygon', 52286)
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOMETRY(MULTIPOLYGONZ,52286) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPolygonZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonZM('multi_polygon')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOMETRY(MULTIPOLYGONZM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPolygonZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonZM('multi_polygon', 52286)
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOMETRY(MULTIPOLYGONZM,52286) not null)', $queryLog['query']);
    }

    /*
     * Geography
     */

    public function testGeographyMultiPolygonIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygon('multi_polygon', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOGRAPHY(MULTIPOLYGON,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPolygonWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygon('multi_polygon', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOGRAPHY(MULTIPOLYGON,4267) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPolygonMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonM('multi_polygon', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOGRAPHY(MULTIPOLYGONM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPolygonMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonM('multi_polygon', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOGRAPHY(MULTIPOLYGONM,4267) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPolygonZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonZ('multi_polygon', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOGRAPHY(MULTIPOLYGONZ,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPolygonZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonZ('multi_polygon', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOGRAPHY(MULTIPOLYGONZ,4267) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPolygonZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonZM('multi_polygon', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOGRAPHY(MULTIPOLYGONZM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPolygonZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPolygonZM('multi_polygon', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_polygon" public.GEOGRAPHY(MULTIPOLYGONZM,4267) not null)', $queryLog['query']);
    }
}
