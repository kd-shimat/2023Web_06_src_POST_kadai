
<?php

use Facebook\WebDriver\Remote\DesiredCapabilities;
use Facebook\WebDriver\Remote\RemoteWebDriver;
use PHPUnit\Framework\TestCase;
use Facebook\WebDriver\WebDriverExpectedCondition;
use Facebook\WebDriver\WebDriverBy;

class SampleTest extends TestCase
{
    public function testPassword()
    {
        // selenium
        $host = 'http://172.17.0.1:4444/wd/hub'; #Github Actions上で実行可能なHost
        // chrome ドライバーの起動
        $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
        // 指定URLへ遷移 (Google)
        $driver->get('http://php/src/form/password.html');
        // テキストボックスの要素を取得
        $element_text = $driver->findElement(WebDriverBy::xpath('//html/body/form/input[1]'));
        $element_password = $driver->findElement(WebDriverBy::xpath('//html/body/form/input[2]'));
        // テキストボックスの要素にそれぞれ値を入力
        $element_text->sendKeys('test1');
        $element_password->sendKeys('test2');

        // 画面遷移実行
        $element_password->submit();

        // pタグから値を取得
        $element_text = $driver->findElement(WebDriverBy::xpath('//html/body/p[1]'));
        $element_password = $driver->findElement(WebDriverBy::xpath('//html/body/p[2]'));

        //assert
        $this->assertStringContainsString("test1", $element_text->getText());
        $this->assertStringContainsString("test2", $element_password->getText());

        // ブラウザを閉じる
        $driver->close();
    }

    public function testPulldown()
    {
        // selenium
        $host = 'http://172.17.0.1:4444/wd/hub'; #Github Actions上で実行可能なHost
        // chrome ドライバーの起動
        $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
        // 指定URLへ遷移 (Google)
        $driver->get('http://php/src/form/pulldown.html');
        // プルダウンの値を取得
        $selector = $driver->findElement(WebDriverBy::xpath('//html/body/form/select'))
            ->findElement(WebDriverBy::cssSelector("option[value='オレンジ']"))
            ->click();
        // 画面遷移実行
        $selector->submit();

        // pタグから値を取得
        $element = $driver->findElement(WebDriverBy::xpath('//html/body/p'));

        //assert
        $this->assertStringContainsString("オレンジ", $element->getText());

        // ブラウザを閉じる
        $driver->close();
    }

    public function testTextarea()
    {
        // selenium
        $host = 'http://172.17.0.1:4444/wd/hub'; #Github Actions上で実行可能なHost
        // chrome ドライバーの起動
        $driver = RemoteWebDriver::create($host, DesiredCapabilities::chrome());
        // 指定URLへ遷移 (Google)
        $driver->get('http://php/src/form/textarea.html');
        // プルダウンの値を取得
        $element = $driver->findElement(WebDriverBy::xpath('//html/body/form/textarea'));

        // テキストボックスの要素にそれぞれ値を入力
        $element->sendKeys('test');
        // 画面遷移実行
        $element->submit();
        // pタグから値を取得
        $element = $driver->findElement(WebDriverBy::xpath('//html/body/p'));

        //assert
        $this->assertEquals("test", $element->getText());

        // ブラウザを閉じる
        $driver->close();
    }
}
