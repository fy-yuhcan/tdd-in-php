<?php

require_once __DIR__ . '/Expression.php';

class Bank
{
    public function reduce($source, $to)
    {
        return $source->reduce($to);
    }

    //testReduceMoneyDifferentCurrencyテストを通すため空実装
    public function addRate($from,$to,$rate)
    {  
          
    }
}