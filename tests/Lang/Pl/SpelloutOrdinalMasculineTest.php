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

        $this->assertEquals('tysięczny', $f->format(1000));
        $this->assertEquals('tysiąc czterysta dziesiąty', $f->format(1410));
        $this->assertEquals('dwa tysiące jedenasty', $f->format(2011));
        $this->assertEquals('trzy tysiące setny', $f->format(3100));
        $this->assertEquals('cztery tysiące drugi', $f->format(4002));

        $this->assertEquals('dziesięciotysięczny', $f->format(10000));
    }
}