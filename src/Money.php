<?php
//共通親クラスの作成
//abstractで実装をサブクラスに任せる
require_once __DIR__ . '/Expression.php';

class Money implements Expression
{
    public $amount;
    protected $currency;

    public function __construct($amount, $currency)
    {
        $this->amount = $amount;
        $this->currency = $currency;
    }

    function times($multiplier){
        return new static($this->amount * $multiplier, $this->currency);
    }

    public function equals(Money $object)
    {   
        //参照が異なっていても値が等しい場合はtrueを返す
        //厳密比較
        return $this->amount === $object->amount
        //オブジェクトのクラスが等しい場合はtrueを返す
         && $this->currency() === $object->currency();
    }

    public function __toString()
    {
        return $this->amount . " " . $this->currency;
    }

    //factory method
    static function dollar($amount)
    {
        return new Money($amount,"USD");
    }

    static function franc($amount)
    {
        return new Money($amount,"CHF");
    }

    public function currency()
    {
        return $this->currency;
    }

    public function plus(Expression $addend):Expression
    {
        return new Sum($this, $addend);
    }

    public function reduce(Bank $bank,$to): Expression
    {
        //moneyクラスのreduceメソッドが通貨変換をしている ===はjavaのequals
        $rate = $bank->rate($this->currency,$to);
        return new Money($this->amount/ $rate,$to);
    }
}