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
namespace Arius\Tests\Lang\Pl;

use Arius\NumberFormatter;

class SpelloutOrdinalMasculineTest extends \PHPUnit_Framework_TestCase
{
    protected $formatter;

    protected function setUp()
    {
        $this->formatter = new NumberFormatter('pl', NumberFormatter::SPELLOUT);
        $this->formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal-masculine");
    }

    public function testDigits()
    {
        $f = $this->formatter;

        $this->assertEquals('zerowy', $f->format(0));
        $this->assertEquals('pierwszy', $f->format(1));
        $this->assertEquals('drugi', $f->format(2));

        $this->assertEquals('jedenasty', $f->format(11));
        $this->assertEquals('dwudziesty pierwszy', $f->format(21));
        $this->assertEquals('osiemdziesiąty', $f->format(80));

        $this->assertEquals('setny', $f->format(100));
        $this->assertEquals('sto drugi', $f->format(102));
        $this->assertEquals('dwieście trzydziesty czwarty', $f->format(234));
        $this->assertEquals('trzechsetny', $f->format(300));
        $this->assertEquals('osiemset dwudziesty', $f->format(820));

        $this->assertEquals('tysięczny', $f->format(1000));
        $this->assertEquals('tysiąc czterysta dziesiąty', $f->format(1410));
        $this->assertEquals('dwa tysiące jedenasty', $f->format(2011));
        $this->assertEquals('trzy tysiące setny', $f->format(3100));
        $this->assertEquals('cztery tysiące drugi', $f->format(4002));
        $this->assertEquals('pięciotysięczny', $f->format(5000));

        $this->assertEquals('dziesięciotysięczny', $f->format(10000));
        $this->assertEquals('dwanaście tysięcy sto czwarty', $f->format(12104));
        $this->assertEquals('dwadzieścia osiem tysięcy trzysta trzydziesty trzeci', $f->format(28333));
        $this->assertEquals('trzydzieści tysięcy setny', $f->format(30100));

        $this->assertEquals('stutysięczny', $f->format(100000));
        $this->assertEquals('sto tysięcy drugi', $f->format(100002));

        $this->assertEquals('milionowy', $f->format(1000000));
        $this->assertEquals('milion pięćsettysięczny', $f->format(1500000));

        $this->assertEquals('trzymilionowy', $f->format(3000000));
        $this->assertEquals('trzy miliony trzeci', $f->format(3000003));
        $this->assertEquals('trzy miliony czterystutysięczny', $f->format(3400000));
        $this->assertEquals('cztery miliony pięćset pięćdziesięciotysięczny', $f->format(4550000));
        $this->assertEquals('cztery miliony siedemset tysięcy czterechsetny', $f->format(4700400));
        $this->assertEquals('pięć milionów czterysta trzydzieści osiem tysięcy trzysta dziesiąty', $f->format(5438310));

        $this->assertEquals('pięciomiliardowy', $f->format(5000000000));
        $this->assertEquals('pięć miliardów osiemsetmilionowy', $f->format(5800000000));
        $this->assertEquals('pięć miliardów osiemset milionów dwustutysięczny', $f->format(5800200000));
        $this->assertEquals('sześć miliardów dziewięćset pięćdziesięcio jednomilionowy', $f->format(6951000000));
    }
}
