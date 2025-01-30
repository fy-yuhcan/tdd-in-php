<?php

require_once __DIR__ . '/Expression.php';

class Bank
{
    public function reduce($source, $to)
    {
        return $source->reduce($to);
    }
}