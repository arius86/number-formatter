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
namespace Arius\Lang\Pl;

class SpelloutOrdinalMasculine extends SpelloutOrdinal
{
    protected $simple = [
        0 => "zerowy",
        1 => "pierwszy" ,
        2 => "drugi",
        3 => "trzeci",
        4 => "czwarty",
        5 => "piąty",
        6 => "szósty",
        7 => "siódmy",
        8 => "ósmy",
        9 => "dziewiąty",
        10 => "dziesiąty",
        11 => "jedenasty",
        12 => "dwunasty",
        13 => "trzynasty",
        14 => "czternasty",
        15 => "piętnasty",
        16 => "szesnasty",
        17 => "siedemnasty",
        18 => "osiemnasty",
        19 => "dziewiętnasty",
        20 => "dwudziesty",
        30 => "trzydziesty",
        40 => "czterdziesty",
        50 => "pięćdziesiąty",
        60 => "sześćdziesiąty",
        70 => "siedemdziesiąty",
        80 => "osiemdziesiąty",
        90 => "dziewięćdziesiąty"
    ];

    protected $zeroes = [
        2 => "setny",
        3 => "tysięczny",
        4 => "tysięczny",
        5 => "tysięczny",
        6 => "milionowy",
        7 => "milionowy",
        8 => "milionowy",
        9 => "miliardowy",
        10 => "miliardowy",
        11 => "miliardowy",
        12 => "bilionowy",
        13 => "bilionowy",
        14 => "bilionowy"
    ];
}
