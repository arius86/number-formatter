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

class SpelloutOrdinalNeuter extends SpelloutOrdinalAbstract
{
    protected $simple = [
        0 => "zerowe",
        1 => "pierwsze" ,
        2 => "drugie",
        3 => "trzecie",
        4 => "czwarte",
        5 => "piąte",
        6 => "szóste",
        7 => "siódme",
        8 => "ósme",
        9 => "dziewiąte",
        10 => "dziesiąte",
        11 => "jedenaste",
        12 => "dwunaste",
        13 => "trzynaste",
        14 => "czternaste",
        15 => "piętnaste",
        16 => "szesnaste",
        17 => "siedemnaste",
        18 => "osiemnaste",
        19 => "dziewiętnaste",
        20 => "dwudzieste",
        30 => "trzydzieste",
        40 => "czterdzieste",
        50 => "pięćdziesiąte",
        60 => "sześćdziesiąte",
        70 => "siedemdziesiąte",
        80 => "osiemdziesiąte",
        90 => "dziewięćdziesiąte"
    ];

    protected $zeroes = [
        2 => "setne",
        3 => "tysięczne",
        6 => "milionowe",
        9 => "miliardowe",
        12 => "bilionowe",
    ];
}
