<?php

namespace Katas\GildedRose\PHP;

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
            if ($item->name == '+5 Dexterity Vest' || $item->name == 'Elixir of the Mongoose') {
                $updater = new GenericQualityUpdater();
                $updater->updateQuality($item);
                continue;
            }

            if ($item->name == 'Aged Brie') {
                $updater = new AgedBrieQualityUpdater();
                $updater->updateQuality($item);
                continue;
            }

            if ($item->name == 'Sulfuras, Hand of Ragnaros') {
                $updater = new SulfurasQualityUpdater();
                $updater->updateQuality($item);
                continue;
            }

            if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                $updater = new BackstagePassesQualityUpdater();
                $updater->updateQuality($item);
                continue;
            }
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
