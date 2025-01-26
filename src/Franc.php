<?php
require_once __DIR__ . '/Money.php';

class Franc extends Money
{
    public function __construct($amount,$currency)
    {
        parent::__construct($amount,$currency);
    }

    public function times($multiplier)
    {
        //5*2=10
        //重複を排除する
        return new Franc($this->amount * $multiplier,$this->currency);
    }
}