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

interface SpelloutInterface
{
    /**
     * @param NumberFormatter $formatter
     */
    public function __construct(NumberFormatter $formatter);

    /**
     * @param int $number
     * @return mixed
     */
    public function format($number);
}
