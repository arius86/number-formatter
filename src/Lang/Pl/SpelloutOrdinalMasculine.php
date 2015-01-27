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

use Arius\SpelloutInterface;
use Arius\SpelloutTrait;

class SpelloutOrdinalMasculine implements SpelloutInterface
{
    use SpelloutTrait;

    protected $ones = array(
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
        19 => "dziewiętnasty"
    );

    /**
     * changed this from keys 3,4,5 etc. need to test
     * @var array
     */
    protected $tens = array(
        20 => "dwudziesty",
        30 => "trzydziesty",
        40 => "czterdziesty",
        50 => "pięćdziesiąty",
        60 => "sześćdziesiąty",
        70 => "siedemdziesiąty",
        80 => "osiemdziesiąty",
        90 => "dziewięćdziesiąty"
    );

    protected $digits = array(
        100 => "setny",
        1000 => "tysięczny",
        1000000 => "milionowy",
        1000000000 => "miliardowy",
        //12 => "biliardowy",
        //15 => "trylionowy"
    );

    protected $prefixes = array(
        1 => array(
            2 => "dwu",
            3 => "trzech",
            4 => "czterech",
            5 => "pięć",
            6 => "sześć",
            7 => "siedem",
            8 => "osiem",
            9 => "dziewięć"
        ),
        2 => array(
            1 => "jedno",
            2 => "dwu",
            3 => "trzy",
            4 => "cztero",
            5 => "pięcio",
            6 => "sześcio",
            7 => "siedmio",
            8 => "ośmio",
            9 => "dziewięcio",
            10 => "dziesięcio",
            11 => "jedenasto",
            12 => "dwunasto",
            13 => "trzynasto",
            14 => "czternasto",
            15 => "piętnasto",
            16 => "szesnasto",
            17 => "siedemnasto",
            18 => "osiemnasto",
            19 => "dziewiętnasto"
        )
    );

    /**
     * @inheritdoc
     */
    public function format($number)
    {
        $cardinal = explode(' ', $this->getCardinal($number));
        $ordinal = array();

        if (count($cardinal) == 1 && $number < 20) {
            return $this->ones[$number];
        }

        $lastDigit = (int)substr($number,-1);

        $secondLastDigit = (int)substr($number,-2, 1);

        if ($secondLastDigit != 0) {
            $ordinal[] = $this->tens[$secondLastDigit];
        }

        if ($lastDigit != 0) {
            $ordinal[] = $this->ones[$lastDigit];
        }

        return implode(' ', $ordinal);
    }

    /**
     * jeżeli dwie ostatnie cyfry są różne od zera, reszta pozostaje w cardinal
     * jeżeli pierwsza i druga cyfra to zero, to szukamy następnej niezerowej cyfry
     * może to być wtedy numer setny, trzechsetny, tysięczny, trzytysięczny, dziewięćdziesięciodziewięciotysięczny
     * trzystutysięczny, trzystuosiemdziesięciosześciotysięczny, milionowy, ...
     * ogólnie grupa setek traktowana będzie osobno
     * potem tysiące, miliony, miliardy itd. mają takie same przedrostki w ramach grupy
     * /
     */
}
