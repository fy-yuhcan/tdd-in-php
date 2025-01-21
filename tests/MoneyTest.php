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
        $five->times(2);

        // 結果が 10 になったかをテスト
        // $this->assertEquals(期待値, 実際の値);
        $this->assertEquals(10, $five->amount);
    }
}
// コンパイルを通すために必要な四つがある
// Dollarクラスがない
// コンストラクタがない
// timesメソッドがない
// amountプロパティがない