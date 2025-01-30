<?php

require_once __DIR__ . '/Expression.php';

class Bank
{
    public function reduce(Expression $source, $to):Expression
    {
        // 通貨変換のロジックをここに実装
        $sum = $source;
        $amount = $sum->augend->amount + $sum->addend->amount;
        return new Money($amount, $to);
    }
}