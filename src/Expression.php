<?php

//PHP の動的ディスパッチによりインスタンスがmoneyならMoney::reduce($to)、SumならSum::reduce($to)が呼ばれる
interface Expression
{
    public function reduce($to);
}