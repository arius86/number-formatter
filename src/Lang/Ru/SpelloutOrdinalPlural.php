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

class SpelloutOrdinalPlural extends SpelloutOrdinalAbstract
{
    protected $simple = [
        0 => "нулевые",
        1 => "первые",
        2 => "вторые",
        3 => "третьи",
        4 => "четвёртые",
        5 => "пятые",
        6 => "шестые",
        7 => "седьмые",
        8 => "шосьмые",
        9 => "девятые",
        10 => "десятые",
        11 => "одиннадцатые",
        12 => "двенадцатые",
        13 => "тринадцатые",
        14 => "четырнадцатые",
        15 => "пятнадцатые",
        16 => "шестнадцатые",
        17 => "семнадцатые",
        18 => "восемнадцатые",
        19 => "девятнадцатые",
        20 => "двадцатые",
        30 => "тридцатые",
        40 => "сороковые",
        50 => "пятидесятые",
        60 => "шестидесятые",
        70 => "семидесятые",
        80 => "восьмидесятые",
        90 => "девяностые"
    ];

    protected $zeroes = [
        2 => "сотые",
        3 => "тысячные",
        6 => "миллионные",
        9 => "миллиардные",
        12 => "триллионные",
        15 => "квадриллионные",			
    ];
}
