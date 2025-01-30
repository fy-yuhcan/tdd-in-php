<?php

require_once __DIR__ . '/Expression.php';

class Bank
{
    public function reduce(Expression $source, $to):Expression
    {
        //キャストを行っている
        //sumフィールドにアクセスしているしかもそのフィールドにさらにアクセスしている
        $sum = $source;
        return $sum->reduce($to);
    }
}