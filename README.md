# Simple outdated dependency checker for laravel pulse dashboard

[![Latest Version on Packagist](https://img.shields.io/packagist/v/avgkudey/pulse-dep-track.svg?style=flat-square)](https://packagist.org/packages/avgkudey/pulse-dep-track)
[![Tests](https://img.shields.io/github/actions/workflow/status/avgkudey/pulse-dep-track/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/avgkudey/pulse-dep-track/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/avgkudey/pulse-dep-track.svg?style=flat-square)](https://packagist.org/packages/avgkudey/pulse-dep-track)

This is where your description should go. Try and limit it to a paragraph or two. Consider adding a small example.

## Support us

[<img src="https://github-ads.s3.eu-central-1.amazonaws.com/pulse-dep-track.jpg?t=1" width="419px" />](https://spatie.be/github-ad-click/pulse-dep-track)

We invest a lot of resources into creating [best in class open source packages](https://spatie.be/open-source). You can support us by [buying one of our paid products](https://spatie.be/open-source/support-us).

We highly appreciate you sending us a postcard from your hometown, mentioning which of our package(s) you are using. You'll find our address on [our contact page](https://spatie.be/about-us). We publish all received postcards on [our virtual postcard wall](https://spatie.be/open-source/postcards).

## Installation

You can install the package via composer:

```bash
composer require avgkudey/pulse-dep-track
```

## Register Recorders
`pulse.php`
```php
return [
    // ...
  Avgkudey\PulseDepTrack\Recorders\ComposerOutdatedRecorder::class => [],
  Avgkudey\PulseDepTrack\Recorders\NpmOutdatedRecorder::class => [],
]
```

## Running Once

```shell
php artisan deptrack:composer
```
```shell
php artisan deptrack:npm
```

## Schedule

`routes/console.php`

```php
Schedule::daily()
    ->timezone('UTC')
    ->group(function () {
        Schedule::command('deptrack:composer');
        Schedule::command('deptrack:npm');
    });

```

### Add to pulse Dashboard

```php
    <livewire:deptrack.composer-outdated cols="full"/>
    
    <livewire:deptrack.npm-outdated cols="full"/>

```
## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [avgkudey](https://github.com/avgkudey)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
