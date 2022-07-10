<?php

namespace RoelGonzalez\QuoteOfTheDayTile;

use App\QuoteOfDayTile\QuoteOfDayStore;
use Illuminate\Support\Collection;
use Livewire\Component;

class QuoteOfTheDayTileComponent extends Component
{
    /** @var string */
    public $position;

    public function mount(string $position)
    {
        $this->position = $position;
    }

    public function render()
    {
        $quoteOfDay = $this->getQuoteOfTheDay();

        return view('dashboard-quote-of-the-day-tile::tile', [
            'refreshIntervalInSeconds' => config('dashboard.tiles.quote_of_the_day.refresh_interval_in_seconds', 3600),
            'quote' => $quoteOfDay['q'],
            'author' => $quoteOfDay['a'],
        ]);
    }

    public function getQuoteOfTheDay(): mixed
    {
        $quoteBatch = Collection::make(QuoteOfTheDayStore::make()->getQuoteOfTheDayData());

        $chosenQuote = $quoteBatch->firstWhere(function ($quote) {
            $maxCharacterLength = config('dashboard.tiles.quote_of_the_day.max_character_length');

            if ($maxCharacterLength === null) {
                return true;
            }

            return $quote['c'] <= $maxCharacterLength;
        });

        if ($chosenQuote === null) {
            $chosenQuote = $quoteBatch->sortBy('c')->first();
        }

        return $chosenQuote;
    }
}
