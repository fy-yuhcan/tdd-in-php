<?php
use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../src/Money.php'; // Moneyクラスの読み込み
require_once __DIR__ . '/../src/Bank.php'; // Bankクラスの読み込み
require_once __DIR__ . '/../src/Expression.php'; // Expressionクラスの読み込み
require_once __DIR__ . '/../src/Sum.php'; // Sumクラスの読み込み

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

    //加算のテスト
    public function testSimpleAddition()
    {
        $five = Money::dollar(5);
        $sum = $five->plus($five);
        $bank = new Bank();
        $sum = Money::dollar(5)->plus(Money::dollar(5));
        $reduced = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(10), $reduced);
    }

    //plusメソッドが返すオブジェクトがaugendとaddendを持っているかをテスト
    public function testPlusReturnsSum()
    {
        $five = Money::dollar(5);
        $result = $five->plus($five);
        $sum = $result;
        $this->assertEquals($five, $sum->augend);
        $this->assertEquals($five, $sum->addend);
    }

    //reduceメソッドが返すオブジェクトがMoneyオブジェクトであるかをテスト
    public function testReduceSum()
    {
        $sum = new Sum(Money::dollar(3), Money::dollar(4));
        $bank = new Bank();
        $result = $bank->reduce($sum, "USD");
        $this->assertEquals(Money::dollar(7), $result);
    }

    //bankのreduceメソッドに渡すexpressionがmoneyインスタンスの場合
    public function testReduceMoney()
    {
        $bank = new Bank();
        $result = $bank->reduce(Money::dollar(1), "USD");
        $this->assertEquals(Money::dollar(1), $result);
    }

    //2フランを1ドルに換算するテスト
    public function testReduceMoneyDifferentCurrency()
    {
        $bank =new Bank();
        $bank->addRate("CHF","USD",2);
        $result = $bank->reduce(Money::franc(2),"USD");

        $this->assertEquals(Money::dollar(1),$result);
    }

    //USDからUSDを与えられたときは1を返す
    public function testIdentityRate()
    {
        $bank = new Bank();
        $this->assertEquals(1,$bank->rate("USD","USD"));
    }
}
