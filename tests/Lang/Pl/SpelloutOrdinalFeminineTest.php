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

class SpelloutOrdinalFeminineTest extends \PHPUnit_Framework_TestCase
{
    protected $formatter;

    protected function setUp()
    {
        $this->formatter = new NumberFormatter('pl', NumberFormatter::SPELLOUT);
        $this->formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal-feminine");
    }

    public function testDigits()
    {
        $f = $this->formatter;

        $this->assertEquals('zerowa', $f->format(0));
        $this->assertEquals('pierwsza', $f->format(1));
        $this->assertEquals('druga', $f->format(2));

        $this->assertEquals('jedenasta', $f->format(11));
        $this->assertEquals('dwudziesta pierwsza', $f->format(21));
        $this->assertEquals('osiemdziesiąta', $f->format(80));

        $this->assertEquals('setna', $f->format(100));
        $this->assertEquals('sto druga', $f->format(102));
        $this->assertEquals('dwieście trzydziesta czwarta', $f->format(234));
        $this->assertEquals('trzechsetna', $f->format(300));
        $this->assertEquals('osiemset dwudziesta', $f->format(820));

        $this->assertEquals('tysięczna', $f->format(1000));
        $this->assertEquals('tysiąc czterysta dziesiąta', $f->format(1410));
        $this->assertEquals('dwa tysiące jedenasta', $f->format(2011));
        $this->assertEquals('trzy tysiące setna', $f->format(3100));
        $this->assertEquals('cztery tysiące druga', $f->format(4002));
        $this->assertEquals('pięciotysięczna', $f->format(5000));

        $this->assertEquals('dziesięciotysięczna', $f->format(10000));
        $this->assertEquals('dwanaście tysięcy sto czwarta', $f->format(12104));
        $this->assertEquals('dwadzieścia osiem tysięcy trzysta trzydziesta trzecia', $f->format(28333));
        $this->assertEquals('trzydzieści tysięcy setna', $f->format(30100));

        $this->assertEquals('stutysięczna', $f->format(100000));
        $this->assertEquals('sto tysięcy druga', $f->format(100002));

        $this->assertEquals('milionowa', $f->format(1000000));
        $this->assertEquals('milion pięćsettysięczna', $f->format(1500000));

        $this->assertEquals('trzymilionowa', $f->format(3000000));
        $this->assertEquals('trzy miliony trzecia', $f->format(3000003));
        $this->assertEquals('trzy miliony czterystutysięczna', $f->format(3400000));
        $this->assertEquals('cztery miliony pięćset pięćdziesięciotysięczna', $f->format(4550000));
        $this->assertEquals('cztery miliony siedemset tysięcy czterechsetna', $f->format(4700400));
        $this->assertEquals('pięć milionów czterysta trzydzieści osiem tysięcy trzysta dziesiąta', $f->format(5438310));

        $this->assertEquals('pięciomiliardowa', $f->format(5000000000));
        $this->assertEquals('pięć miliardów osiemsetmilionowa', $f->format(5800000000));
        $this->assertEquals('pięć miliardów osiemset milionów dwustutysięczna', $f->format(5800200000));
        $this->assertEquals('sześć miliardów dziewięćset pięćdziesięcio jednomilionowa', $f->format(6951000000));
    }
}
