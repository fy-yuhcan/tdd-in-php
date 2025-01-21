<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Dollar.php'; // Dollarクラスの読み込み

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        // 5ドルを表すDollarオブジェクトを作る
        $five = new Dollar(5);

        // timesメソッドで掛け算（乗算）する
        //これで新しいDollarオブジェクトが返ってくる
        $products = $five->times(2);

        // 結果が 10 になったかをテスト
        // $this->assertEquals(期待値, 実際の値);
        $this->assertEquals(10, $products->amount);

        //Dollarの副作用をどうするか
        //dollarのtimeメソッドを変更しないとコンパイルできない
        $products = $five->times(3);
        $this->assertEquals(15, $products->amount); 
    }

    //value objectが等しいかどうかをテストする、valueobjectはオブジェクトの中身を変更しない
    public function testEquality()
    {
        // 5ドルを表すDollarオブジェクトを作る
        $five = new Dollar(5);

        // 5ドルと5ドルが等しいかをテスト
        // $this->assertTrue(条件); は、条件が真であることをテスト
        $this->assertTrue($five->equals(new Dollar(5)));

        //等価性が正しくないことを確認する
        //等価性比較を一般化する必要が生まれる
        $this->assertFalse($five->equals(new Dollar(6)));
    }
}
// コンパイルを通すために必要な四つがある
// Dollarクラスがない
// コンストラクタがない
// timesメソッドがない
// amountプロパティがない