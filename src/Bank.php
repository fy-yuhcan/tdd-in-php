<?php

require_once __DIR__ . '/Expression.php';

class Bank
{
    public function reduce($source, $to)
    {
        //Moneyオブジェクトの場合はそのまま返す
        if ($source instanceof Money) {
            return $source->reduce($to);
        }

        $sum = $source;
        return $sum->reduce($to);
    }
}