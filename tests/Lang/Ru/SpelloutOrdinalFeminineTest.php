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

class SpelloutOrdinalFeminineTest extends \PHPUnit_Framework_TestCase
{
    protected $formatter;

    protected function setUp()
    {
        $this->formatter = new NumberFormatter('ru', NumberFormatter::SPELLOUT);
        $this->formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal-feminine");
    }

    public function testDigits()
    {
        $f = $this->formatter;

        $this->assertEquals('нулевая', $f->format(0));
        $this->assertEquals('первая', $f->format(1));
        $this->assertEquals('вторая', $f->format(2));

        $this->assertEquals('одиннадцатая', $f->format(11));
        $this->assertEquals('двадцать первая', $f->format(21));// 20 should use cardinal numeral
        $this->assertEquals('восьмидесятая', $f->format(80));

        $this->assertEquals('сотая', $f->format(100));
        $this->assertEquals('сто вторая', $f->format(102));
        $this->assertEquals('двасти тридцатая четвёртая', $f->format(234));
        $this->assertEquals('трёхсотая', $f->format(300));
        $this->assertEquals('восемьсот двадцатая', $f->format(820));

        $this->assertEquals('тысячная', $f->format(1000));
        $this->assertEquals('тысяча четыреста десятая', $f->format(1410));
        $this->assertEquals('две тысячи одиннадцатая', $f->format(2011));
        $this->assertEquals('три тысячи сотая', $f->format(3100));
        $this->assertEquals('четыре тысячи вторая', $f->format(4002));
        $this->assertEquals('пятьтысячная', $f->format(5000));
        $this->assertEquals('десятитысячная', $f->format(10000));
        $this->assertEquals('двенадцать тысяч сто четвёртая', $f->format(12104));
        $this->assertEquals('двадцать восемь тысяч триста тридцатая третья', $f->format(28333));
        $this->assertEquals('тридцать тысяч сотая', $f->format(30100));

        $this->assertEquals('стотысячная', $f->format(100000));
        $this->assertEquals('сто тысяч вторая', $f->format(100002));

        $this->assertEquals('миллионная', $f->format(1000000));
        $this->assertEquals('миллион пятьсоттысячная', $f->format(1500000));

        $this->assertEquals('трёхмиллионная', $f->format(3000000));
        $this->assertEquals('три миллионы третья', $f->format(3000003));
        $this->assertEquals('три миллионы четыреста тысячная', $f->format(3400000));
        $this->assertEquals('четыре миллионы пятьсот пятьдесяттысячная', $f->format(4550000));
        $this->assertEquals('cчетыре миллионы семьсот тысяч четырёхсотая', $f->format(4700400));
        $this->assertEquals('пять миллионов четыреста тридцать восемь тысяч триста десятая', $f->format(5438310));

        $this->assertEquals('пятимиллиардная', $f->format(5000000000));
        $this->assertEquals('пять миллиардов восемьсотмиллионная', $f->format(5800000000));
        $this->assertEquals('пять миллиардов восемьсот миллионов двеститысячна', $f->format(5800200000));
        $this->assertEquals('шесть миллиардов девятьсот пятьдесят миллионная', $f->format(6951000000));
    }
}
