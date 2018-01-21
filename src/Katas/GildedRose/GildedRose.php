<?php

namespace Katas\GildedRose;

use Exception;

class GildedRose
{
    private $items;

    public function __construct(array $items)
    {
        $this->items = array_map(
            function($item) {
                if ($item->quality < 0) {
                    throw new Exception('An item quality can never be negative');
                }
                if ($item->quality > 50 && $item->name != 'Sulfuras, Hand of Ragnaros') {
                    throw new Exception('An item quality can not be higher than 50');
                }
                if ($item->quality != 80 && $item->name == 'Sulfuras, Hand of Ragnaros') {
                    throw new Exception('The quality of the item "Sulfuras" must be 80');
                }
                return $item;
            },
            $items
        );
    }

    public function updateQuality()
    {
        foreach ($this->items as $item) {
            $qualityUpdater = QualityUpdaterFactory::build($item->name);
            $qualityUpdater->updateQuality($item);
        }
    }

    /**
     * @return Item|bool
     */
    public function getItem(string $key)
    {
        return $this->items[$key] ?? false;
    }
}
