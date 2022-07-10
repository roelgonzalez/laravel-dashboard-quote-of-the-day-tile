# A quote of the day tile for the Laravel Dashboard

[![Latest Version on Packagist](https://img.shields.io/packagist/v/roelgonzalez/laravel-dashboard-quote-of-the-day-tile.svg?style=flat-square)](https://packagist.org/packages/roelgonzalez/laravel-dashboard-quote-of-the-day-tile)
[![Total Downloads](https://img.shields.io/packagist/dt/roelgonzalez/laravel-dashboard-quote-of-the-day-tile.svg?style=flat-square)](https://packagist.org/packages/roelgonzalez/laravel-dashboard-quote-of-the-day-tile)

This tile displays a quote of the day on your dashboard.

This tile can be used on [the Laravel Dashboard](https://docs.spatie.be/laravel-dashboard).

<p align="center"><img src="art/img.png" alt="Screenshot of Quote of the Day Tile"></p>

## Installation

You can install the package via composer:

```bash
composer require roelgonzalez/laravel-dashboard-quote-of-the-day-tile
```

```php
// in config/dashboard.php

return [
    // ...
    'tiles' => [
        'quote_of_the_day' => [
            'max_character_length' => 70, // null for no limit
            'refresh_interval_in_seconds' => 3600,
        ],
    ],
];
```

In `app\Console\Kernel.php` you should schedule the `RoelGonzalez\QuoteOfTheDayTile\FetchQuoteOfTheDayDataCommand` to run every day (or however often you'd like the quote to change).

```php
// in app/console/Kernel.php

protected function schedule(Schedule $schedule)
{
    // ...
    $schedule->command(\RoelGonzalez\QuoteOfTheDayTile\FetchQuoteOfTheDayDataCommand::class)->dailyAt('05:00');
}
```

## Usage

In your dashboard view you use the `livewire:quote-of-the-day-tile` component.

```html
<x-dashboard>
    <livewire:quote-of-the-day-tile position="a1" />
</x-dashboard>
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](https://github.com/spatie/.github/blob/main/CONTRIBUTING.md) for details.

## Credits

- [Roël Gonzalez](https://github.com/roelgonzalez)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
