<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Dollar.php'; // Dollarクラスの読み込み
require_once __DIR__ . '/../src/Franc.php'; // Francクラスの読み込み
require_once __DIR__ . '/../src/Money.php'; // Moneyクラスの読み込み

class MoneyTest extends TestCase
{
    public function testMultiplication()
    {
        // ファクトリーメソッドを使って5ドルを表すDollarオブジェクトを作る
        $five = Money::dollar(5);

        // 結果が 10 になったかをテスト
        // $this->assertEquals(期待値, 実際の値);
        //値オブジェクトとしての等価性をテストする、内部の実装に依存せず「10ドル」という振る舞いそのものをテスト
        $this->assertEquals(Money::dollar(10), $five->times(2));

        $this->assertEquals(Money::dollar(15), $five->times(3)); 
    }

    //value objectが等しいかどうかをテストする、valueobjectはオブジェクトの中身を変更しない
    public function testEquality()
    {
        // 5ドルを表すDollarオブジェクトを作る
        $five = Money::dollar(5);

        //DollarとFrancの比較
        //DollarとFrancが等しいかどうかをテスト
        $this->assertFalse((Money::dollar(5))->equals(Money::franc(5)));
    }

    public function TestCurrency()
    {
        //通貨のテスト
        //通貨の等価性をテストする
        $this->assertEquals("USD", Money::dollar(1)->currency());
        $this->assertEquals("CHF", Money::franc(1)->currency());
    }
}
