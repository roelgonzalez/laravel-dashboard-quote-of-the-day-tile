<?php

namespace RoelGonzalez\QuoteOfTheDayTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class QuoteOfTheDayTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchQuoteOfTheDayDataCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-quote-of-the-day-tile'),
        ], 'dashboard-quote-of-the-day-tile');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-quote-of-the-day-tile');

        Livewire::component('quote-of-the-day-tile', QuoteOfTheDayTileComponent::class);
    }
}
