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
        //productsは用を成さなくなったため削除

        // 結果が 10 になったかをテスト
        // $this->assertEquals(期待値, 実際の値);
        //値オブジェクトとしての等価性をテストする、内部の実装に依存せず「10ドル」という振る舞いそのものをテスト
        $this->assertEquals(new Dollar(10), $five->times(2));

        //Dollarの副作用をどうするか
        //dollarのtimeメソッドを変更しないとコンパイルできない

        $this->assertEquals(new Dollar(15), $five->times(3)); 
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