<?php
require_once __DIR__ . '/Money.php';

class Dollar extends Money
{
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($multiplier)
    {
        //5*2=10
        //重複を排除する
        return new Dollar($this->amount * $multiplier);
    }

    public function currency()
    {
        return "USD";
    }
}