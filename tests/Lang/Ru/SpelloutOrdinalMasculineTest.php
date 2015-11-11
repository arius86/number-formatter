<?php
/**
 * This file is part of arius/number-formatter package
 *
 * @author Arkadiusz Ostrycharz <arkadiusz.ostrycharz@gmail.com>
 * @copyright Arius IT Arkadiusz Ostrycharz
 * @homepage http://arius.pl
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace Arius\Tests\Lang\Ru;

use Arius\NumberFormatter;

class SpelloutOrdinalMasculineTest extends \PHPUnit_Framework_TestCase
{
    protected $formatter;

    protected function setUp()
    {
        $this->formatter = new NumberFormatter('ru', NumberFormatter::SPELLOUT);
        $this->formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal-masculine");
    }

    public function testDigits()
    {
        $f = $this->formatter;

        $this->assertEquals('нулевой', $f->format(0));
        $this->assertEquals('первый', $f->format(1));
        $this->assertEquals('второй', $f->format(2));

        $this->assertEquals('одиннадцатый', $f->format(11));
        $this->assertEquals('двадцать первый', $f->format(21));// 20 should use cardinal numeral
        $this->assertEquals('восьмидесятый', $f->format(80));

        $this->assertEquals('сотый', $f->format(100));
        $this->assertEquals('сто второй', $f->format(102));
        $this->assertEquals('двести тридцать четвёртый', $f->format(234));
        $this->assertEquals('трёхсотый', $f->format(300));
        $this->assertEquals('восемьсот двадцатый', $f->format(820));

        $this->assertEquals('тысячный', $f->format(1000));
        $this->assertEquals('тысяча четыреста десятый', $f->format(1410));	
        $this->assertEquals('две тысячи одиннадцатый', $f->format(2011));	
        $this->assertEquals('три тысячи сотый', $f->format(3100));
        $this->assertEquals('четыре тысячи второй', $f->format(4002));
        $this->assertEquals('пятитысячный', $f->format(5000));
        $this->assertEquals('десятитысячный', $f->format(10000));
        $this->assertEquals('двенадцать тысяч сто четвёртый', $f->format(12104));
        $this->assertEquals('двадцать восемь тысяч триста тридцать третий', $f->format(28333));
        $this->assertEquals('тридцать тысяч сотый', $f->format(30100));

        $this->assertEquals('стотысячный', $f->format(100000));
        $this->assertEquals('сто тысяч второй', $f->format(100002));

        $this->assertEquals('миллионный', $f->format(1000000));
        $this->assertEquals('миллион пятисотыйтысячный', $f->format(1500000));

        $this->assertEquals('трёхмиллионный', $f->format(3000000));
        $this->assertEquals('три миллионы третий', $f->format(3000003));
        $this->assertEquals('три миллионы четырёхсотыйтысячный', $f->format(3400000));
        $this->assertEquals('четыре миллионы пятьсот пятидесятитысячный', $f->format(4550000));
        $this->assertEquals('четыре миллионы семьсот тысяч четырёхсотый', $f->format(4700400));
        $this->assertEquals('пять миллионов четыреста тридцать восемь тысяч триста десятый', $f->format(5438310));

        $this->assertEquals('пятимиллиардный', $f->format(5000000000));
        $this->assertEquals('пять миллиардов восьмисотыймиллионный', $f->format(5800000000));
        $this->assertEquals('пять миллиардов восемьсот миллионов двухсотыйтысячный', $f->format(5800200000));
        $this->assertEquals('шесть миллиардов девятьсот пятьдесят миллионный', $f->format(6951000000));
    }
}
