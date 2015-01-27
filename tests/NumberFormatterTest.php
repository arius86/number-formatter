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
namespace Arius\Tests;

use Arius\NumberFormatter;

class NumberFormatterTest extends \PHPUnit_Framework_TestCase
{
    protected $orginalFormatter;
    protected $myFormatter;

    protected function setUp()
    {
        $this->orginalFormatter = new \NumberFormatter('pl', \NumberFormatter::SPELLOUT);
        $this->myFormatter = new NumberFormatter('pl', NumberFormatter::SPELLOUT);
    }

    public function testDefault()
    {
        $this->assertEquals(
            $this->orginalFormatter->format(42),
            $this->myFormatter->format(42)
        );
    }

    public function testTextAttribute()
    {
        $this->assertEquals('%spellout-numbering', $this->orginalFormatter->getTextAttribute(NumberFormatter::DEFAULT_RULESET));
        $this->assertEquals('%spellout-numbering', $this->myFormatter->getTextAttribute(NumberFormatter::DEFAULT_RULESET));

        $this->assertFalse($this->orginalFormatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal"));
        $this->assertEquals(1, $this->orginalFormatter->getErrorCode());

        $this->assertTrue($this->myFormatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, "%spellout-ordinal"));
        $this->assertEquals(0, $this->myFormatter->getErrorCode());

        $this->assertEquals('%spellout-numbering', $this->orginalFormatter->getTextAttribute(NumberFormatter::DEFAULT_RULESET));
        $this->assertEquals('%spellout-ordinal-masculine', $this->myFormatter->getTextAttribute(NumberFormatter::DEFAULT_RULESET));
    }
}
