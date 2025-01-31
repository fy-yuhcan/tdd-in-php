<?php

//PHP の動的ディスパッチによりインスタンスがmoneyならMoney::reduce($to)、SumならSum::reduce($to)が呼ばれる
interface Expression
{
    //phpでは$thisは使えない（予約された参照だから)
    public function reduce(Bank $bank,$to);
}