<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\CornerStore;
use App\Item;

function generateReport(int $days = 100): string
{

    $report = "Report:\n";

    $items = array(
        new Item('Banana', 10, 20),
        new Item('Twinkie', 2, 0),
        new Item('Slushie', 5, 7),
        new Item('Beef Jerky', 0, 80),
        new Item('Beef Jerky', -1, 80),
        new Item('Lotto Ticket', 15, 20),
        new Item('Lotto Ticket', 10, 49),
        new Item('Lotto Ticket', 5, 49),
        // this conjured item does not work properly yet
        // new Item('Conjured Mana Cake', 3, 6)
    );

    $app = new CornerStore($items);

    for ($i = 0; $i < $days; $i++) {
        $report .= "-------- day $i --------\n";
        $report .= "name, daysUntilExpired, price\n";
        foreach ($items as $item) {
            $report .= $item . PHP_EOL;
        }
        $report .= PHP_EOL;
        $app->updateInventory();
    }

    return $report;
}
