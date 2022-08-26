<?php

namespace Clickbar\Magellan\Schema\Grammars;

use Illuminate\Support\Fluent;

/**
 * @mixin \Illuminate\Database\Schema\Grammars\PostgresGrammar
 */
class MagellanGrammar
{
    /*
     * Point
     */

    public function typeMagellanPoint(): \Closure
    {
        return $this->createTypeDefinitionClosure('POINT');
    }

    public function typeMagellanPointZ(): \Closure
    {
        return $this->createTypeDefinitionClosure('POINTZ');
    }

    public function typeMagellanPointM(): \Closure
    {
        return $this->createTypeDefinitionClosure('POINTM');
    }

    public function typeMagellanPointZM(): \Closure
    {
        return $this->createTypeDefinitionClosure('POINTZM');
    }

    /*
     * Line String
     */

    public function typeMagellanLineString(): \Closure
    {
        return $this->createTypeDefinitionClosure('LINESTRING');
    }

    public function typeMagellanLineStringZ(): \Closure
    {
        return $this->createTypeDefinitionClosure('LINESTRINGZ');
    }

    public function typeMagellanLineStringM(): \Closure
    {
        return $this->createTypeDefinitionClosure('LINESTRINGM');
    }

    public function typeMagellanLineStringZM(): \Closure
    {
        return $this->createTypeDefinitionClosure('LINESTRINGZM');
    }

    /*
     * Polygon
     */

    public function typeMagellanPolygon(): \Closure
    {
        return $this->createTypeDefinitionClosure('POLYGON');
    }

    public function typeMagellanPolygonZ(): \Closure
    {
        return $this->createTypeDefinitionClosure('POLYGONZ');
    }

    public function typeMagellanPolygonM(): \Closure
    {
        return $this->createTypeDefinitionClosure('POLYGONM');
    }

    public function typeMagellanPolygonZM(): \Closure
    {
        return $this->createTypeDefinitionClosure('POLYGONZM');
    }

    /*
     * Multi Point
     */

    public function typeMagellanMultiPoint(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTIPOINT');
    }

    public function typeMagellanMultiPointZ(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTIPOINTZ');
    }

    public function typeMagellanMultiPointM(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTIPOINTM');
    }

    public function typeMagellanMultiPointZM(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTIPOINTZM');
    }

    /*
     * Multi Line String
     */

    public function typeMagellanMultiLineString(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTILINESTRING');
    }

    public function typeMagellanMultiLineStringZ(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTILINESTRINGZ');
    }

    public function typeMagellanMultiLineStringM(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTILINESTRINGM');
    }

    public function typeMagellanMultiLineStringZM(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTILINESTRINGZM');
    }

    /*
     * Multi Polygon
     */

    public function typeMagellanMultiPolygon(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTIPOLYGON');
    }

    public function typeMagellanMultiPolygonZ(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTIPOLYGONZ');
    }

    public function typeMagellanMultiPolygonM(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTIPOLYGONM');
    }

    public function typeMagellanMultiPolygonZM(): \Closure
    {
        return $this->createTypeDefinitionClosure('MULTIPOLYGONZM');
    }

    /*
     * Geometry Collection
     */

    public function typeMagellanGeometryCollection(): \Closure
    {
        return $this->createTypeDefinitionClosure('GEOMETRYCOLLECTION');
    }

    public function typeMagellanGeometryCollectionZ(): \Closure
    {
        return $this->createTypeDefinitionClosure('GEOMETRYCOLLECTIONZ');
    }

    public function typeMagellanGeometryCollectionM(): \Closure
    {
        return $this->createTypeDefinitionClosure('GEOMETRYCOLLECTIONM');
    }

    public function typeMagellanGeometryCollectionZM(): \Closure
    {
        return $this->createTypeDefinitionClosure('GEOMETRYCOLLECTIONZM');
    }

    /*
     * Base Types
     */

    public function typeMagellanGeography(): \Closure
    {
        return function (Fluent $column) {
            return MagellanGrammarHelper::createTypeDefinition($column, 'GEOGRAPHY');
        };
    }

    public function typeMagellanGeometry(): \Closure
    {
        return function (Fluent $column) {
            return MagellanGrammarHelper::createTypeDefinition($column, 'GEOMETRY');
        };
    }

    /*
     *  COMPILE Statements
     */

    /**
     * Adds a statement to create the postgis extension
     *
     * @return \Closure
     */
    public function compileEnablePostgis(): \Closure
    {
        return function () {
            return 'CREATE EXTENSION postgis;';
        };
    }

    /**
     * Adds a statement to create the postgis extension, if it doesn't already exist
     *
     * @return \Closure
     */
    public function compileEnablePostgisIfNotExists(): \Closure
    {
        return function () {
            return 'CREATE EXTENSION IF NOT EXISTS postgis;';
        };
    }

    /**
     * Adds a statement to drop the postgis extension
     *
     * @return \Closure
     */
    public function compileDisablePostgis(): \Closure
    {
        return function () {
            return 'DROP EXTENSION postgis;';
        };
    }

    /**
     * Adds a statement to drop the postgis extension, if it exists
     *
     * @return \Closure
     */
    public function compileDisablePostgisIfExists(): \Closure
    {
        return function () {
            return 'DROP EXTENSION IF EXISTS postgis;';
        };
    }

    private function createTypeDefinitionClosure(string $geometryType): \Closure
    {
        return function (Fluent $column) use ($geometryType) {
            return MagellanGrammarHelper::createTypeDefinition($column, $geometryType);
        };
    }
}
