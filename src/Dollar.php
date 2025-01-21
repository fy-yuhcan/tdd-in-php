<?php
class Dollar
{
    public $amount;

    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function times($multiplier)
    {
        //5*2=10
        //重複を排除する
        $this->amount *= $multiplier;
    }
}