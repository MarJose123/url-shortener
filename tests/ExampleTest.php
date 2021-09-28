<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Marjose\UrlShortener\Models\UrlShorten;
use Marjose\UrlShortener\Facades\UrlShortener;

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

    $response = UrlShortener::url('https://pestphp.com/docs/plugins/laravel')->setLength(5)->generate();
    $generatedLink = UrlShorten::all();
    expect($generatedLink)
        ->toHaveCount(1)
        ->and($generatedLink->first()->id)->toBe($response->id);
});


it('can generate new shorten url link with expiration', function () {
    $response = UrlShortener::url('https://pestphp.com/docs/plugins/laravel')->setLength(5)->setExpiration(15)->generate();
    $generatedLink = UrlShorten::all();
    expect($generatedLink)
        ->toHaveCount(1)
        ->and($generatedLink->first()->id)->toBe($response->id);
});