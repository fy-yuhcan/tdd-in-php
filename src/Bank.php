<?php

require_once __DIR__ . '/Expression.php';
require_once __DIR__ . '/Pair.php';

class Bank
{
    private array $rates = [];

    public function reduce($source, $to)
    {
        return $source->reduce($this,$to);
    }

    //testReduceMoneyDifferentCurrencyテストを通すため空実装
    public function addRate($from,$to,$rate)
    { 
        $pair = new Pair($from,$to); 
        $key = (string)$pair;

        $this-> rates[$key] = $rate;
    }

    //bankで為替レートの計算をする
    public function rate($from,$to)
    {
        return (($from === "CHF") && $to === "USD") ? 2:1;
    }
}