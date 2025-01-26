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

        // timesメソッドで掛け算（乗算）する
        //productsは用を成さなくなったため削除

        // 結果が 10 になったかをテスト
        // $this->assertEquals(期待値, 実際の値);
        //値オブジェクトとしての等価性をテストする、内部の実装に依存せず「10ドル」という振る舞いそのものをテスト
        $this->assertEquals(Money::dollar(10), $five->times(2));

        //Dollarの副作用をどうするか
        //dollarのtimeメソッドを変更しないとコンパイルできない

        $this->assertEquals(Money::dollar(15), $five->times(3)); 
    }

    //value objectが等しいかどうかをテストする、valueobjectはオブジェクトの中身を変更しない
    public function testEquality()
    {
        // 5ドルを表すDollarオブジェクトを作る
        $five = Money::Dollar(5);

        // 5ドルと5ドルが等しいかをテスト
        // $this->assertTrue(条件); は、条件が真であることをテスト
        $this->assertTrue($five->equals(Money::Dollar(5)));

        //等価性が正しくないことを確認する
        //等価性比較を一般化する必要が生まれる
        $this->assertFalse($five->equals(Money::Dollar(6)));

        //DollarとFrancの比較
        //DollarとFrancが等しいかどうかをテスト
        $this->assertFalse((Money::Dollar(5))->equals(Money::Franc(5)));
    }

    //TODO:5CHF*2=10CHF
    public function testFrancMultiplication()
    {
        // 5フランを表すFrancオブジェクトを作る
        $five = Money::franc(5);

        // timesメソッドで掛け算（乗算）する
        //productsは用を成さなくなったため削除

        // 結果が 10 になったかをテスト
        // $this->assertEquals(期待値, 実際の値);
        //値オブジェクトとしての等価性をテストする、内部の実装に依存せず「10ドル」という振る舞いそのものをテスト
        $this->assertEquals(Money::franc(10), $five->times(2));

        //Dollarの副作用をどうするか
        //dollarのtimeメソッドを変更しないとコンパイルできない

        $this->assertEquals(Money::franc(15), $five->times(3)); 
    }

    public function TestCurrency()
    {
        //通貨のテスト
        //通貨の等価性をテストする
        $this->assertEquals("USD", Money::dollar(1)->currency());
        $this->assertEquals("CHF", Money::franc(1)->currency());
    }

    public function testDifferentClassEquality()
    {
        //FrancとDollarが等しいかどうかをテスト
        $this->assertTrue((new Money(10, "CHF"))->equals(new Franc(10, "CHF")));
    }
}
// コンパイルを通すために必要な四つがある
// Dollarクラスがない
// コンストラクタがない
// timesメソッドがない
// amountプロパティがない