<?php

namespace Clickbar\Magellan\Tests\Migration;

use Clickbar\Magellan\Tests\TestCase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MultiLineStringTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Geometry
     */

    public function testGeometryMultiLineStringIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineString('multi_line_string')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOMETRY(MULTILINESTRING,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiLineStringWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineString('multi_line_string', 52286)
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOMETRY(MULTILINESTRING,52286) not null)', $queryLog['query']);
    }

    public function testGeometryMultiLineStringMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringM('multi_line_string')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOMETRY(MULTILINESTRINGM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiLineStringMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringM('multi_line_string', 52286)
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOMETRY(MULTILINESTRINGM,52286) not null)', $queryLog['query']);
    }

    public function testGeometryMultiLineStringZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringZ('multi_line_string')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOMETRY(MULTILINESTRINGZ,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiLineStringZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringZ('multi_line_string', 52286)
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOMETRY(MULTILINESTRINGZ,52286) not null)', $queryLog['query']);
    }

    public function testGeometryMultiLineStringZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringZM('multi_line_string')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOMETRY(MULTILINESTRINGZM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiLineStringZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringZM('multi_line_string', 52286)
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOMETRY(MULTILINESTRINGZM,52286) not null)', $queryLog['query']);
    }

    /*
     * Geography
     */

    public function testGeographyMultiLineStringIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineString('multi_line_string', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOGRAPHY(MULTILINESTRING,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiLineStringWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineString('multi_line_string', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOGRAPHY(MULTILINESTRING,4267) not null)', $queryLog['query']);
    }

    public function testGeographyMultiLineStringMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringM('multi_line_string', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOGRAPHY(MULTILINESTRINGM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiLineStringMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringM('multi_line_string', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOGRAPHY(MULTILINESTRINGM,4267) not null)', $queryLog['query']);
    }

    public function testGeographyMultiLineStringZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringZ('multi_line_string', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOGRAPHY(MULTILINESTRINGZ,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiLineStringZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringZ('multi_line_string', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOGRAPHY(MULTILINESTRINGZ,4267) not null)', $queryLog['query']);
    }

    public function testGeographyMultiLineStringZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringZM('multi_line_string', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOGRAPHY(MULTILINESTRINGZM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiLineStringZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiLineStringZM('multi_line_string', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_line_string" public.GEOGRAPHY(MULTILINESTRINGZM,4267) not null)', $queryLog['query']);
    }
}
