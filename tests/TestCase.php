<?php

namespace Marjose\UrlShortener\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use Marjose\UrlShortener\UrlShortenerServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'Marjose\\UrlShortener\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            UrlShortenerServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        config()->set('database.default', 'testing');
        $migration = include __DIR__.'/../database/migrations/create_url-shortener_table.php.stub';
        $migration->up();
    }
}
