<?php

namespace RoelGonzalez\QuoteOfTheDayTile;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\View as ViewFacade;
use Livewire\Component;

class QuoteOfTheDayTileComponent extends Component
{
    public string $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render(): View
    {
        $quoteOfDay = $this->getQuoteOfTheDay();

        return ViewFacade::make('dashboard-quote-of-the-day-tile::tile', [
            'refreshInterval' => Config::get('dashboard.tiles.quote_of_the_day.refresh_interval_in_seconds', 3600),
            'quote' => $quoteOfDay['q'] ?? '',
            'author' => $quoteOfDay['a'] ?? '',
        ]);
    }

    public function getQuoteOfTheDay(): array
    {
        $quoteBatch = Collection::make(QuoteOfTheDayStore::make()->getQuoteOfTheDayData());

        $chosenQuote = $quoteBatch->first(function (array $quote): bool {
            $maxCharacterLength = Config::get('dashboard.tiles.quote_of_the_day.max_character_length');

            if ($maxCharacterLength === null) {
                return true;
            }

            return ($quote['c'] ?? 0) <= $maxCharacterLength;
        });

        if ($chosenQuote === null) {
            $chosenQuote = $quoteBatch->sortBy('c')->first();
        }

        return $chosenQuote;
    }
}
