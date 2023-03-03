<?php

namespace Clickbar\Magellan\Tests\Migration;

use Clickbar\Magellan\Tests\TestCase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PointTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Geometry
     */

    public function testGeometryPointIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPoint('point')
        );

        $this->assertEquals('create table "test" ("point" public.GEOMETRY(POINT,4326) not null)', $queryLog['query']);
    }

    public function testGeometryPointWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPoint('point', 52286)
        );

        $this->assertEquals('create table "test" ("point" public.GEOMETRY(POINT,52286) not null)', $queryLog['query']);
    }

    public function testGeometryPointMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointM('point')
        );

        $this->assertEquals('create table "test" ("point" public.GEOMETRY(POINTM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryPointMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointM('point', 52286)
        );

        $this->assertEquals('create table "test" ("point" public.GEOMETRY(POINTM,52286) not null)', $queryLog['query']);
    }

    public function testGeometryPointZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointZ('point')
        );

        $this->assertEquals('create table "test" ("point" public.GEOMETRY(POINTZ,4326) not null)', $queryLog['query']);
    }

    public function testGeometryPointZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointZ('point', 52286)
        );

        $this->assertEquals('create table "test" ("point" public.GEOMETRY(POINTZ,52286) not null)', $queryLog['query']);
    }

    public function testGeometryPointZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointZM('point')
        );

        $this->assertEquals('create table "test" ("point" public.GEOMETRY(POINTZM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryPointZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointZM('point', 52286)
        );

        $this->assertEquals('create table "test" ("point" public.GEOMETRY(POINTZM,52286) not null)', $queryLog['query']);
    }

    /*
     * Geography
     */

    public function testGeographyPointIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPoint('point', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("point" public.GEOGRAPHY(POINT,4326) not null)', $queryLog['query']);
    }

    public function testGeographyPointWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPoint('point', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("point" public.GEOGRAPHY(POINT,4267) not null)', $queryLog['query']);
    }

    public function testGeographyPointMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointM('point', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("point" public.GEOGRAPHY(POINTM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyPointMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointM('point', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("point" public.GEOGRAPHY(POINTM,4267) not null)', $queryLog['query']);
    }

    public function testGeographyPointZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointZ('point', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("point" public.GEOGRAPHY(POINTZ,4326) not null)', $queryLog['query']);
    }

    public function testGeographyPointZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointZ('point', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("point" public.GEOGRAPHY(POINTZ,4267) not null)', $queryLog['query']);
    }

    public function testGeographyPointZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointZM('point', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("point" public.GEOGRAPHY(POINTZM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyPointZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanPointZM('point', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("point" public.GEOGRAPHY(POINTZM,4267) not null)', $queryLog['query']);
    }
}
