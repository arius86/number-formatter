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

class SpelloutOrdinalNeuterTest extends \PHPUnit_Framework_TestCase
{
    protected $formatter;

    protected function setUp()
    {
        $this->formatter = new NumberFormatter('pl', NumberFormatter::SPELLOUT);
        $this->formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal-neuter");
    }

    public function testDigits()
    {
        $f = $this->formatter;

        $this->assertEquals('zerowe', $f->format(0));
        $this->assertEquals('pierwsze', $f->format(1));
        $this->assertEquals('drugie', $f->format(2));

        $this->assertEquals('jedenaste', $f->format(11));
        $this->assertEquals('dwudzieste pierwsze', $f->format(21));
        $this->assertEquals('osiemdziesiąte', $f->format(80));

        $this->assertEquals('setne', $f->format(100));
        $this->assertEquals('sto drugie', $f->format(102));
        $this->assertEquals('dwieście trzydzieste czwarte', $f->format(234));
        $this->assertEquals('trzechsetne', $f->format(300));
        $this->assertEquals('osiemset dwudzieste', $f->format(820));

        $this->assertEquals('tysięczne', $f->format(1000));
        $this->assertEquals('tysiąc czterysta dziesiąte', $f->format(1410));
        $this->assertEquals('dwa tysiące jedenaste', $f->format(2011));
        $this->assertEquals('trzy tysiące setne', $f->format(3100));
        $this->assertEquals('cztery tysiące drugie', $f->format(4002));
        $this->assertEquals('pięciotysięczne', $f->format(5000));

        $this->assertEquals('dziesięciotysięczne', $f->format(10000));
        $this->assertEquals('dwanaście tysięcy sto czwarte', $f->format(12104));
        $this->assertEquals('dwadzieścia osiem tysięcy trzysta trzydzieste trzecie', $f->format(28333));
        $this->assertEquals('trzydzieści tysięcy setne', $f->format(30100));

        $this->assertEquals('stutysięczne', $f->format(100000));
        $this->assertEquals('sto tysięcy drugie', $f->format(100002));

        $this->assertEquals('milionowe', $f->format(1000000));
        $this->assertEquals('milion pięćsettysięczne', $f->format(1500000));

        $this->assertEquals('trzymilionowe', $f->format(3000000));
        $this->assertEquals('trzy miliony trzecie', $f->format(3000003));
        $this->assertEquals('trzy miliony czterystutysięczne', $f->format(3400000));
        $this->assertEquals('cztery miliony pięćset pięćdziesięciotysięczne', $f->format(4550000));
        $this->assertEquals('cztery miliony siedemset tysięcy czterechsetne', $f->format(4700400));
        $this->assertEquals('pięć milionów czterysta trzydzieści osiem tysięcy trzysta dziesiąte', $f->format(5438310));

        $this->assertEquals('pięciomiliardowe', $f->format(5000000000));
        $this->assertEquals('pięć miliardów osiemsetmilionowe', $f->format(5800000000));
        $this->assertEquals('pięć miliardów osiemset milionów dwustutysięczne', $f->format(5800200000));
        $this->assertEquals('sześć miliardów dziewięćset pięćdziesięcio jednomilionowe', $f->format(6951000000));
    }
}
