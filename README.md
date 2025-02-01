# Simple outdated dependency checker for laravel pulse dashboard

[![Latest Version on Packagist](https://img.shields.io/packagist/v/avgkudey/pulse-dep-track.svg?style=flat-square)](https://packagist.org/packages/avgkudey/pulse-dep-track)
[![Tests](https://img.shields.io/github/actions/workflow/status/avgkudey/pulse-dep-track/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/avgkudey/pulse-dep-track/actions/workflows/run-tests.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/avgkudey/pulse-dep-track.svg?style=flat-square)](https://packagist.org/packages/avgkudey/pulse-dep-track)

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
