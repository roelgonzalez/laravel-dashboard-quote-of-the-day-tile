<?php

namespace RoelGonzalez\QuoteOfTheDayTile;

use Spatie\Dashboard\Models\Tile;

class QuoteOfTheDayStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName('quote-of-the-day');
    }

    public function setQuoteOfTheDayData(array $quoteOfTheDayData): self
    {
        $this->tile->putData('quote-of-the-day-data', $quoteOfTheDayData);

        return $this;
    }

    public function getQuoteOfTheDayData()
    {
        return $this->tile->getData('quote-of-the-day-data');
    }
}
