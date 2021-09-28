<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Marjose\UrlShortener\Models\UrlShorten;
use Marjose\UrlShortener\UrlShortener;

uses(RefreshDatabase::class);
it('can test', function () {
    expect(true)->toBeTrue();
});

/*//beforeEach(function () {
//    $urlshortener = new UrlShortener('https://pestphp.com/docs/plugins/laravel');
//    $response = $urlshortener->setLength(5)->generate();
//});

it('can insert the new url link')->assertDatabaseHas('urlShortener', [
   'id' => 1
]);*/

it('can generate a new shorten url link', function () {
    $urlshortener = new UrlShortener('https://pestphp.com/docs/plugins/laravel');
    $response = $urlshortener->setLength(5)->generate();
    $generatedLink = UrlShorten::all();
    expect($generatedLink)
        ->toHaveCount(1)
        ->and($generatedLink->first()->id)->toBe($response->id);
});
