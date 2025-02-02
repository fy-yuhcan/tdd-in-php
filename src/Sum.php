<?php

require_once __DIR__ . '/Money.php';
require_once __DIR__ . '/Expression.php';

class Sum implements Expression
{
    public $augend;
    public $addend;

    public function __construct(Expression $augend, Expression $addend)
    {
        $this->augend = $augend;
        $this->addend = $addend;
    }

    public function reduce(Bank $bank,$to): Expression
    {
        //augendとaddendを同じ通貨に換算してから足し算する
        $amount = $this->augend->reduce($bank,$to)->amount + $this->addend->reduce($bank,$to)->amount;
        return new Money($amount, $to);
    }
}