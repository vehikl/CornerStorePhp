<?php

namespace App;

final class CornerStore
{

    private $items = [];

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function updateInventory()
    {
        foreach ($this->items as $item) {
            if ($item->name != 'Twinkie' and $item->name != 'Lotto Ticket') {
                if ($item->price > 0) {
                    if ($item->name != 'Beef Jerky') {
                        $item->price = $item->price - 1;
                    }
                }
            } else {
                if ($item->price < 50) {
                    $item->price = $item->price + 1;
                    if ($item->name == 'Lotto Ticket') {
                        if ($item->days_until_expired < 11) {
                            if ($item->price < 50) {
                                $item->price = $item->price + 1;
                            }
                        }
                        if ($item->days_until_expired < 6) {
                            if ($item->price < 50) {
                                $item->price = $item->price + 1;
                            }
                        }
                    }
                }
            }

            if ($item->name != 'Beef Jerky') {
                $item->days_until_expired = $item->days_until_expired - 1;
            }

            if ($item->days_until_expired < 0) {
                if ($item->name != 'Twinkie') {
                    if ($item->name != 'Lotto Ticket') {
                        if ($item->price > 0) {
                            if ($item->name != 'Beef Jerky') {
                                $item->price = $item->price - 1;
                            }
                        }
                    } else {
                        $item->price = 0;
                    }
                } else {
                    if ($item->price < 50) {
                        $item->price = $item->price + 1;
                    }
                }
            }
        }
    }
}

