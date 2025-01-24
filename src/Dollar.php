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

    public function equals(Dollar $object)
    {   
        //参照が異なっていても値が等しい場合はtrueを返す
        //厳密比較
        return $this->amount === $object->amount;
    }
}