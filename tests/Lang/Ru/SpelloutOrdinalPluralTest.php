<?php
/**
 * This file is part of arius/number-formatter package
 *
 * @author Arkadiusz Ostrycharz <arkadiusz.ostrycharz@gmail.com>
 * @copyright Arius IT Arkadiusz Ostrycharz
 * @homepage http://arius.pl
 *
 * Russian Version:
 * @copyright Grigorij Kosba 
 * @homepage http://www.lern-online.net
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Arius\Tests\Lang\Ru;

use Arius\NumberFormatter;

class SpelloutOrdinalPluralTest extends \PHPUnit_Framework_TestCase
{
    protected $formatter;

    protected function setUp()
    {
        $this->formatter = new NumberFormatter('ru', NumberFormatter::SPELLOUT);
        $this->formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal-plural");
    }

    public function testDigits()
    {
        $f = $this->formatter;

        $this->assertEquals('нулевые', $f->format(0));
        $this->assertEquals('первые', $f->format(1));
        $this->assertEquals('вторые', $f->format(2));

        $this->assertEquals('одиннадцатые', $f->format(11));
        $this->assertEquals('двадцать первые', $f->format(21));// 20 should use cardinal numeral
        $this->assertEquals('восьмидесятые', $f->format(80));

        $this->assertEquals('сотые', $f->format(100));
        $this->assertEquals('сто вторые', $f->format(102));
        $this->assertEquals('двасти тридцатые четвёртые', $f->format(234));
        $this->assertEquals('трёхсотые', $f->format(300));
        $this->assertEquals('восемьсот двадцатые', $f->format(820));

        $this->assertEquals('тысячные', $f->format(1000));
        $this->assertEquals('тысяча четыреста десятые', $f->format(1410));
        $this->assertEquals('две тысячи одиннадцатые', $f->format(2011));
        $this->assertEquals('три тысячи сотые', $f->format(3100));
        $this->assertEquals('четыре тысячи вторые', $f->format(4002));		
        $this->assertEquals('пятитысячные', $f->format(5000));
        $this->assertEquals('десятитысячные', $f->format(10000));
        $this->assertEquals('двенадцать тысяч сто четвёртые', $f->format(12104));
        $this->assertEquals('двадцать восемь тысяч триста тридцатые третьи', $f->format(28333));
        $this->assertEquals('тридцать тысяч сотые', $f->format(30100));

        $this->assertEquals('стотысячные', $f->format(100000));
        $this->assertEquals('сто тысяч вторые', $f->format(100002));

        $this->assertEquals('миллионные', $f->format(1000000));
        $this->assertEquals('миллион пятьсоттысячные', $f->format(1500000));

        $this->assertEquals('три миллионные', $f->format(3000000));// 'три' is missing
        $this->assertEquals('три миллионы третьи', $f->format(3000003));
        $this->assertEquals('три миллионы четырестатысячные', $f->format(3400000));
        $this->assertEquals('четыре миллионы пятьсот пятьдесяттысячные', $f->format(4550000));
        $this->assertEquals('четыре миллионы семьсот тысяч четырёхсотые', $f->format(4700400));
        $this->assertEquals('пять миллионов четыреста тридцать восемь тысяч триста десятые', $f->format(5438310));

        $this->assertEquals('пятимиллиардные', $f->format(5000000000));
        $this->assertEquals('пять миллиардов восемьсотмиллионные', $f->format(5800000000));
        $this->assertEquals('пять миллиардов восемьсот миллионов двеститысячные', $f->format(5800200000));
        $this->assertEquals('шесть миллиардов девятьсот пятьдесят миллионные', $f->format(6951000000));
    }
}
