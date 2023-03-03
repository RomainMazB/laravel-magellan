<?php

namespace Clickbar\Magellan\Tests\Migration;

use Clickbar\Magellan\Tests\TestCase;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MultiPointTest extends TestCase
{
    use RefreshDatabase;

    /*
     * Geometry
     */

    public function testGeometryMultiPointIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPoint('multi_point')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOMETRY(MULTIPOINT,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPointWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPoint('multi_point', 52286)
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOMETRY(MULTIPOINT,52286) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPointMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointM('multi_point')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOMETRY(MULTIPOINTM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPointMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointM('multi_point', 52286)
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOMETRY(MULTIPOINTM,52286) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPointZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointZ('multi_point')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOMETRY(MULTIPOINTZ,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPointZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointZ('multi_point', 52286)
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOMETRY(MULTIPOINTZ,52286) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPointZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointZM('multi_point')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOMETRY(MULTIPOINTZM,4326) not null)', $queryLog['query']);
    }

    public function testGeometryMultiPointZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointZM('multi_point', 52286)
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOMETRY(MULTIPOINTZM,52286) not null)', $queryLog['query']);
    }

    /*
     * Geography
     */

    public function testGeographyMultiPointIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPoint('multi_point', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOGRAPHY(MULTIPOINT,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPointWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPoint('multi_point', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOGRAPHY(MULTIPOINT,4267) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPointMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointM('multi_point', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOGRAPHY(MULTIPOINTM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPointMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointM('multi_point', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOGRAPHY(MULTIPOINTM,4267) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPointZIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointZ('multi_point', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOGRAPHY(MULTIPOINTZ,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPointZWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointZ('multi_point', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOGRAPHY(MULTIPOINTZ,4267) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPointZMIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointZM('multi_point', postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOGRAPHY(MULTIPOINTZM,4326) not null)', $queryLog['query']);
    }

    public function testGeographyMultiPointZMWithSridIsSupported(): void
    {
        $queryLog = $this->runMigration(
            fn (Blueprint $table) => $table->magellanMultiPointZM('multi_point', 4267, postgisType: 'GEOGRAPHY')
        );

        $this->assertEquals('create table "test" ("multi_point" public.GEOGRAPHY(MULTIPOINTZM,4267) not null)', $queryLog['query']);
    }
}
