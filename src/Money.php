<?php
//共通親クラスの作成
//abstractで実装をサブクラスに任せる
abstract class Money
{
    protected $amount;

    abstract function times($multiplier);

    public function equals(Money $object)
    {   
        //参照が異なっていても値が等しい場合はtrueを返す
        //厳密比較
        return $this->amount === $object->amount
        //オブジェクトのクラスが等しい場合はtrueを返す
         && get_class($this) === get_class($object);
    }

    //factory method
    static function dollar($amount)
    {
        return new Dollar($amount);
    }
}