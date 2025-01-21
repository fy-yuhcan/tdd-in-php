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
        $products = $five->times(2);

        // 結果が 10 になったかをテスト
        // $this->assertEquals(期待値, 実際の値);
        $this->assertEquals(10, $products->amount);

        //Dollarの副作用をどうするか
        //dollarのtimeメソッドを変更しないとコンパイルできない
        $five->times(3);
        $this->assertEquals(15, $products->amount);
    }
}
// コンパイルを通すために必要な四つがある
// Dollarクラスがない
// コンストラクタがない
// timesメソッドがない
// amountプロパティがない