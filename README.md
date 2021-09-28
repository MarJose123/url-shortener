# URL Shortener

[![Latest Version on Packagist](https://img.shields.io/packagist/v/whoami213/url-shortener.svg?style=flat-square)](https://packagist.org/packages/whoami213/url-shortener)
[![GitHub Tests Action Status](https://img.shields.io/github/workflow/status/whoami213/url-shortener/run-tests?label=tests)](https://github.com/whoami213/url-shortener/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/workflow/status/whoami213/url-shortener/Check%20&%20fix%20styling?label=code%20style)](https://github.com/whoami213/url-shortener/actions?query=workflow%3A"Check+%26+fix+styling"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/whoami213/url-shortener.svg?style=flat-square)](https://packagist.org/packages/whoami213/url-shortener)


This is where your description should go. Limit it to a paragraph or two. Consider adding a small example.

## Installation

You can install the package via composer:

```bash
composer require marjose/UrlShortener
```

You can publish and run the migrations with:

```bash
php artisan vendor:publish --provider="Marjose\UrlShortener\UrlShortenerServiceProvider" --tag="UrlShortener-migrations"
php artisan migrate
```

You can publish the config file with:
```bash
php artisan vendor:publish --provider="Marjose\UrlShortener\UrlShortenerServiceProvider" --tag="UrlShortener-config"
```

This is the contents of the published config file:

```php
return [
    'length' => 6, // Length of the string for shortening the URL
    'expiration' => 120, // minutes, 0 for no expiration
];
```

## Usage

Generating the URL by using the default setting from the Config file.
```php
use Marjose\UrlShortener\Facades\UrlShortener;
$response = UrlShortener::url('https://xxxx.xx/xxxx')->generate();
```

Generating the URL by adding expiration to the link.
```php
use Marjose\UrlShortener\Facades\UrlShortener;
$response = UrlShortener::url('https://xxxx.xx/xxxx')->setExpiration(15)->generate();
```
Generating the URL by overriding the default setting from the Config file.
```php
use Marjose\UrlShortener\Facades\UrlShortener;
$response = UrlShortener::url('https://xxxx.xx/xxxx')->setLength(5)->setExpiration(15)->generate();
```
Validate if the shorted URL is expired or not
```php
use Marjose\UrlShortener\Facades\UrlShortener;
$response = UrlShortener::url('https://xxxx.xx/xxxx')->isExpired();

// This will return boolean or an exception if the supplied url is not found in the database
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Credits

- [MarJose](https://github.com/whoami213)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
