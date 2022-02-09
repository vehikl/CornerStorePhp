<?php

namespace App;

final class Item
{

    public $name;
    public $days_until_expired;
    public $price;

    function __construct($name, $days_until_expired, $price)
    {
        $this->name = $name;
        $this->days_until_expired = $days_until_expired;
        $this->price = $price;
    }

    public function __toString()
    {
        return "{$this->name}, {$this->days_until_expired}, {$this->price}";
    }
}

