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

class SpelloutOrdinalMasculine extends SpelloutOrdinalAbstract
{
    protected $simple = [
        0 => "нулевой",
        1 => "первый",
        2 => "второй",
        3 => "третий",
        4 => "четвёртый",
        5 => "пятый",
        6 => "шестой",
        7 => "седьмой",
        8 => "шосьмой",
        9 => "девятый",
        10 => "десятый",
        11 => "одиннадцатый",
        12 => "двенадцатый",
        13 => "тринадцатый",
        14 => "четырнадцатый",
        15 => "пятнадцатый",
        16 => "шестнадцатый",
        17 => "семнадцатый",
        18 => "восемнадцатый",
        19 => "девятнадцатый",
        20 => "двадцатый",
        30 => "тридцатый",
        40 => "сороковой",
        50 => "пятидесятый",
        60 => "шестидесятый",
        70 => "семидесятый",
        80 => "восьмидесятый",
        90 => "девяностый"
    ];

    protected $zeroes = [
        2 => "сотый",
        3 => "тысячный",
        6 => "миллионный",
        9 => "миллиардный",
        12 => "триллионный",
    ];
}
?>