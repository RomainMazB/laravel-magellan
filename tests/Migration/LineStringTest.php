<?php

namespace Clickbar\Magellan\Tests\Migration;

use Clickbar\Magellan\Tests\TestCase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LineStringTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Geometry
     */

    public function testGeometryLineStringIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineString('line_string')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOMETRY(LINESTRING,4326) not null)', $queryLog['query']);
    }

    public function testGeometryLineStringWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineString('line_string', 52286)
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOMETRY(LINESTRING,52286) not null)', $queryLog['query']);
    }

    public function testGeometryLineStringMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringM('line_string')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOMETRY(LINESTRINGM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryLineStringMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringM('line_string', 52286)
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOMETRY(LINESTRINGM,52286) not null)', $queryLog['query']);
    }

    public function testGeometryLineStringZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringZ('line_string')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOMETRY(LINESTRINGZ,4326) not null)', $queryLog['query']);
    }

    public function testGeometryLineStringZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringZ('line_string', 52286)
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOMETRY(LINESTRINGZ,52286) not null)', $queryLog['query']);
    }

    public function testGeometryLineStringZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringZM('line_string')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOMETRY(LINESTRINGZM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryLineStringZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringZM('line_string', 52286)
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOMETRY(LINESTRINGZM,52286) not null)', $queryLog['query']);
    }

    /*
     * Geography
     */

    public function testGeographyLineStringIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineString('line_string', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOGRAPHY(LINESTRING,4326) not null)', $queryLog['query']);
    }

    public function testGeographyLineStringWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineString('line_string', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOGRAPHY(LINESTRING,4267) not null)', $queryLog['query']);
    }

    public function testGeographyLineStringMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringM('line_string', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOGRAPHY(LINESTRINGM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyLineStringMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringM('line_string', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOGRAPHY(LINESTRINGM,4267) not null)', $queryLog['query']);
    }

    public function testGeographyLineStringZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringZ('line_string', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOGRAPHY(LINESTRINGZ,4326) not null)', $queryLog['query']);
    }

    public function testGeographyLineStringZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringZ('line_string', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOGRAPHY(LINESTRINGZ,4267) not null)', $queryLog['query']);
    }

    public function testGeographyLineStringZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringZM('line_string', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOGRAPHY(LINESTRINGZM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyLineStringZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanLineStringZM('line_string', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("line_string" public.GEOGRAPHY(LINESTRINGZM,4267) not null)', $queryLog['query']);
    }
}
