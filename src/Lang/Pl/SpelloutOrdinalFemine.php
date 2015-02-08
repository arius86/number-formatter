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

class SpelloutOrdinalFemine extends SpelloutOrdinal
{
    protected $simple = array(
        0 => "zerowa",
        1 => "pierwsza" ,
        2 => "druga",
        3 => "trzecia",
        4 => "czwarta",
        5 => "piąta",
        6 => "szósta",
        7 => "siódma",
        8 => "ósma",
        9 => "dziewiąta",
        10 => "dziesiąta",
        11 => "jedenasta",
        12 => "dwunasta",
        13 => "trzynasta",
        14 => "czternasta",
        15 => "piętnasta",
        16 => "szesnasta",
        17 => "siedemnasta",
        18 => "osiemnasta",
        19 => "dziewiętnasta",
        20 => "dwudziesta",
        30 => "trzydziesta",
        40 => "czterdziesta",
        50 => "pięćdziesiąta",
        60 => "sześćdziesiąta",
        70 => "siedemdziesiąta",
        80 => "osiemdziesiąta",
        90 => "dziewięćdziesiąta"
    );

    protected $zeroes = array(
        2 => "setna",
        3 => "tysięczna",
        4 => "tysięczna",
        5 => "tysięczna",
        6 => "milionowa",
        7 => "milionowa",
        8 => "milionowa",
        9 => "miliardowa",
        10 => "miliardowa",
        11 => "miliardowa",
        12 => "bilionowa",
        13 => "bilionowa",
        14 => "bilionowa"
    );
}
