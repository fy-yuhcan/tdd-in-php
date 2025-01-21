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
        return new Dollar($this->amount * $multiplier);
    }
}