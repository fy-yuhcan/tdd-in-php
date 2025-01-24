<?php
require_once __DIR__ . '/Money.php';

class Dollar extends Money
{
    public function __construct($amount, $currency)
    {
        parent::__construct($amount, $currency);
    }

    public function times($multiplier)
    {
        //5*2=10
        //重複を排除する
        return Money::dollar($this->amount * $multiplier);
    }
}