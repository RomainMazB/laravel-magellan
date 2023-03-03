<?php

namespace Clickbar\Magellan\Tests\Migration;

use Clickbar\Magellan\Tests\TestCase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PolygonTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Geometry
     */

    public function testGeometryPolygonIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygon('polygon')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOMETRY(POLYGON,4326) not null)', $queryLog['query']);
    }

    public function testGeometryPolygonWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygon('polygon', 52286)
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOMETRY(POLYGON,52286) not null)', $queryLog['query']);
    }

    public function testGeometryPolygonMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonM('polygon')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOMETRY(POLYGONM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryPolygonMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonM('polygon', 52286)
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOMETRY(POLYGONM,52286) not null)', $queryLog['query']);
    }

    public function testGeometryPolygonZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonZ('polygon')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOMETRY(POLYGONZ,4326) not null)', $queryLog['query']);
    }

    public function testGeometryPolygonZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonZ('polygon', 52286)
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOMETRY(POLYGONZ,52286) not null)', $queryLog['query']);
    }

    public function testGeometryPolygonZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonZM('polygon')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOMETRY(POLYGONZM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryPolygonZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonZM('polygon', 52286)
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOMETRY(POLYGONZM,52286) not null)', $queryLog['query']);
    }

    /*
     * Geography
     */

    public function testGeographyPolygonIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygon('polygon', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOGRAPHY(POLYGON,4326) not null)', $queryLog['query']);
    }

    public function testGeographyPolygonWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygon('polygon', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOGRAPHY(POLYGON,4267) not null)', $queryLog['query']);
    }

    public function testGeographyPolygonMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonM('polygon', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOGRAPHY(POLYGONM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyPolygonMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonM('polygon', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOGRAPHY(POLYGONM,4267) not null)', $queryLog['query']);
    }

    public function testGeographyPolygonZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonZ('polygon', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOGRAPHY(POLYGONZ,4326) not null)', $queryLog['query']);
    }

    public function testGeographyPolygonZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonZ('polygon', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOGRAPHY(POLYGONZ,4267) not null)', $queryLog['query']);
    }

    public function testGeographyPolygonZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonZM('polygon', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOGRAPHY(POLYGONZM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyPolygonZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPolygonZM('polygon', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("polygon" public.GEOGRAPHY(POLYGONZM,4267) not null)', $queryLog['query']);
    }
}
