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

class SpelloutOrdinalTest extends \PHPUnit_Framework_TestCase
{
    protected $formatter;

    protected function setUp()
    {
        $this->formatter = new NumberFormatter('pl', NumberFormatter::SPELLOUT);
        $this->formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal");

        $this->masculineFormatter = new NumberFormatter('pl', NumberFormatter::SPELLOUT);
        $this->masculineFormatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal-masculine");
    }

    public function testDigits()
    {
        $randomNumber = rand(1,100000);

        $this->assertEquals(
            $this->formatter->format($randomNumber),
            $this->masculineFormatter->format($randomNumber)
        );
    }
}
