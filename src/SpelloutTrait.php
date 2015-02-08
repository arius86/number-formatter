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
namespace Arius;

trait SpelloutTrait
{
    protected $formatter;

    /**
     * @inheritdoc
     */
    public function __construct(NumberFormatter $formatter)
    {
        $this->formatter = clone $formatter;
    }

    /**
     * Get cardinal number as words array.
     *
     * @param $number
     * @return array
     */
    protected function getCardinalArray($number)
    {
        $this->formatter->setTextAttribute(NumberFormatter::DEFAULT_RULESET, '%spellout-cardinal');
        $cardinal = explode(' ', $this->formatter->format($number));

        return $cardinal;
    }
}
