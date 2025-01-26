<?php
require_once __DIR__ . '/Money.php';

class Franc extends Money
{
    public function __construct($amount,$currency)
    {
        parent::__construct($amount,$currency);
    }
}