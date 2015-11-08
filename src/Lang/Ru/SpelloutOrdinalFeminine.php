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
namespace Arius\Lang\Ru;

class SpelloutOrdinalFeminine extends SpelloutOrdinalAbstract
{
    protected $simple = [
        0 => "нулевая",
        1 => "первая",
        2 => "вторая",
        3 => "третья",
        4 => "четвёртая",
        5 => "пятая", 
        6 => "шестая",
        7 => "седьмая",
        8 => "шосьмая",
        9 => "девятая",
        10 => "десятая",
        11 => "одиннадцатая",
        12 => "двенадцатая",
        13 => "тринадцатая",
        14 => "четырнадцатая",
        15 => "пятнадцатая",
        16 => "шестнадцатая",
        17 => "семнадцатая",
        18 => "восемнадцатая",
        19 => "девятнадцатая",
        20 => "двадцатая",
        30 => "тридцатая",
        40 => "сороковая",
        50 => "пятидесятая",
        60 => "шестидесятая",
        70 => "семидесятая",
        80 => "восьмидесятая",
        90 => "девяностая"
    ];

    protected $zeroes = [
        2 => "сотая",
        3 => "тысячная",
        6 => "миллионная",
        9 => "миллиардная",
        12 => "биллионная",
    ];
}
?>