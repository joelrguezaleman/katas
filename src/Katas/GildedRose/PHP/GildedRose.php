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

            if ($item->name != 'Aged Brie' and $item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality > 0) {
                    if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                        $item->quality = $item->quality - 1;
                    }
                }
            } else {
                if ($item->quality < 50) {
                    $item->quality = $item->quality + 1;
                    if ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->sellIn < 11) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                        if ($item->sellIn < 6) {
                            if ($item->quality < 50) {
                                $item->quality = $item->quality + 1;
                            }
                        }
                    }
                }
            }
            
            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sellIn = $item->sellIn - 1;
            }
            
            if ($item->sellIn < 0) {
                if ($item->name != 'Aged Brie') {
                    if ($item->name != 'Backstage passes to a TAFKAL80ETC concert') {
                        if ($item->quality > 0) {
                            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                                $item->quality = $item->quality - 1;
                            }
                        }
                    } else {
                        $item->quality = $item->quality - $item->quality;
                    }
                } else {
                    if ($item->quality < 50) {
                        $item->quality = $item->quality + 1;
                    }
                }
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
