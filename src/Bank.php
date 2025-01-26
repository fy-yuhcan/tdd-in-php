<?php

require_once __DIR__ . '/Expression.php';

class Bank
{
    public function reduce(Expression $source, $to):Expression
    {
        return $source->reduce($to);
    }
}