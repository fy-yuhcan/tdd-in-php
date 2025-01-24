<?php
require_once __DIR__ . '/Money.php';

class Franc extends Money
{
    private $currency;

    public function __construct($amount)
    {
        $this->amount = $amount;
        $this->currency = "CHF";
    }

    public function times($multiplier)
    {
        //5*2=10
        //重複を排除する
        return new Franc($this->amount * $multiplier);
    }

    public function currency()
    {
        return $this->currency;
    }
}