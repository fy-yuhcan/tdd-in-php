<?php

//PHP の動的ディスパッチによりインスタンスがmoneyならMoney::reduce($to)、SumならSum::reduce($to)が呼ばれる
interface Expression
{
    public function times($multiplier);
    public function plus(Expression $addend);
    //phpでは$thisは使えない（予約された参照だから)
    public function reduce(Bank $bank,$to);
}