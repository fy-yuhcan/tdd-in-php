<?php

class Pair
{
    private $from;
    private $to;

    public function __construct($from,$to){
        $this->from = $from;
        $this->to = $to;
    }

    //from,toという通貨のペアをハッシュテーブルのキーにしたい、from,toが同じならtrue,複数通貨ペアを衝突なく扱うには文字列化してキー化する
    public function equals($object)
    {
         // 1) 型チェック：$object が Pair かどうか
        if (!($object instanceof self)) {
            return false;
        }

        // 2) 文字列比較
        return ($this->from === $object->from) && ($this->to === $object->to);
    }

     // 連想配列のキーとして文字列化する
    public function __toString(): string
    {
        return $this->from . '->' . $this->to;
    }
}