<?php

namespace Clickbar\Magellan\Tests;

use Clickbar\Magellan\MagellanServiceProvider;
use Closure;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();
    }

    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Clickbar\\Magellan\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            MagellanServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        Config::set('database.default', 'pgsql');
    }

    protected function withQueryLog(Closure $fn): array
    {
        $this->getConnection()->flushQueryLog();
        $this->getConnection()->enableQueryLog();
        $fn();

        return $this->getConnection()->getQueryLog();
    }

    protected function runMigration(Closure $fnCreate): array
    {
        $this->getConnection()->statement('CREATE EXTENSION IF NOT EXISTS postgis');

        return $this->withQueryLog(function () use ($fnCreate): void {
            Schema::create('test', function (Blueprint $table) use ($fnCreate): void {
                $fnCreate($table);
            });
        })[0];
    }
}
