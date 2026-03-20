<?php

namespace RoelGonzalez\QuoteOfTheDayTile;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchQuoteOfTheDayDataCommand extends Command
{
    protected $signature = 'dashboard:fetch-qod-data';

    protected $description = 'Fetch data for quote of the day tile';

    public function handle(): void
    {
        $quoteOfTheDayData = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get('https://zenquotes.io/api/quotes')->json();

        QuoteOfTheDayStore::make()->setQuoteOfTheDayData($quoteOfTheDayData);

        $this->info('All done!');
    }
}
