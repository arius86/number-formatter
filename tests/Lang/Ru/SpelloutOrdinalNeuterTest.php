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

class SpelloutOrdinalNeuterTest extends \PHPUnit_Framework_TestCase
{
    protected $formatter;

    protected function setUp()
    {
        $this->formatter = new NumberFormatter('ru', NumberFormatter::SPELLOUT);
        $this->formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal-neuter");
    }

    public function testDigits()
    {
        $f = $this->formatter;

        $this->assertEquals('нулевое', $f->format(0));
        $this->assertEquals('первое', $f->format(1));
        $this->assertEquals('второе', $f->format(2));

        $this->assertEquals('одиннадцатое', $f->format(11));
        $this->assertEquals('двадцать первое', $f->format(21));// 20 should use cardinal numeral
        $this->assertEquals('восьмидесятое', $f->format(80));

        $this->assertEquals('сотое', $f->format(100));
        $this->assertEquals('сто второе', $f->format(102));
        $this->assertEquals('двести тридцать четвёртое', $f->format(234));
        $this->assertEquals('трёхсотое', $f->format(300));
        $this->assertEquals('восемьсот двадцатое', $f->format(820));

        $this->assertEquals('тысячное', $f->format(1000));
        $this->assertEquals('тысяча четыреста десятое', $f->format(1410));
        $this->assertEquals('две тысячи одиннадцатое', $f->format(2011));
        $this->assertEquals('три тысячи сотое', $f->format(3100));
        $this->assertEquals('четыре тысячи второе', $f->format(4002));
        $this->assertEquals('пятитысячное', $f->format(5000));
        $this->assertEquals('десятитысячное', $f->format(10000));
        $this->assertEquals('двенадцать тысяч сто четвёртое', $f->format(12104));
        $this->assertEquals('двадцать восемь тысяч триста тридцать третье', $f->format(28333));
        $this->assertEquals('тридцать тысяч сотое', $f->format(30100));

        $this->assertEquals('стотысячное', $f->format(100000));
        $this->assertEquals('сто тысяч второе', $f->format(100002));

        $this->assertEquals('миллионное', $f->format(1000000));
        $this->assertEquals('миллион пятисотыйтысячное', $f->format(1500000));

        $this->assertEquals('трёхмиллионное', $f->format(3000000));// 'три' is missing
        $this->assertEquals('три миллионы третье', $f->format(3000003));
        $this->assertEquals('три миллионы четырёхсотыйтысячное', $f->format(3400000));
        $this->assertEquals('четыре миллионы пятьсот пятидесятитысячное', $f->format(4550000));
        $this->assertEquals('четыре миллионы семьсот тысяч четырёхсотое', $f->format(4700400));
        $this->assertEquals('пять миллионов четыреста тридцать восемь тысяч триста десятое', $f->format(5438310));

        $this->assertEquals('пятимиллиардное', $f->format(5000000000));
        $this->assertEquals('пять миллиардов восьмисотыймиллионное', $f->format(5800000000));
        $this->assertEquals('пять миллиардов восемьсот миллионов двухсотыйтысячное', $f->format(5800200000));
        $this->assertEquals('шесть миллиардов девятьсот пятьдесят миллионное', $f->format(6951000000));
    }
}
