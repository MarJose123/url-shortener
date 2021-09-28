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
];
```

## Usage

```php
$url-shortener = new Marjose\UrlShortener();
echo $url-shortener->echoPhrase('Hello, Marjose!');
```

## Testing

```bash
composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [MarJose](https://github.com/marjose)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
