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

class SpelloutOrdinalNeuter extends SpelloutOrdinalAbstract
{
    protected $simple = [
        0 => "нулевое",
        1 => "первое",
        2 => "второе",
        3 => "третье",
        4 => "четвёртое",
        5 => "пятое",
        6 => "шестое",
        7 => "седьмое",
        8 => "шосьмое",
        9 => "девятое",
        10 => "десятое",
        11 => "одиннадцатое",
        12 => "двенадцатое",
        13 => "тринадцатое",
        14 => "четырнадцатое",
        15 => "пятнадцатое",
        16 => "шестнадцатое",
        17 => "семнадцатое",
        18 => "восемнадцатое",
        19 => "девятнадцатое",
        20 => "двадцатое",
        30 => "тридцатое",
        40 => "сороковое",
        50 => "пятидесятое",
        60 => "шестидесятое",
        70 => "семидесятое",
        80 => "восьмидесятое",
        90 => "девяностое"
    ];

    protected $zeroes = [
        2 => "сотое",
        3 => "тысячное",
        6 => "миллионное",
        9 => "миллиардное",
        12 => "биллионное",
    ];
}
?>