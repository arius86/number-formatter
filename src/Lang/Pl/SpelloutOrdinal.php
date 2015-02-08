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

class SpelloutOrdinal implements SpelloutInterface
{
    use SpelloutTrait;

    protected $simple = array(
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
    );

    protected $complex = array(
        1 => "",
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
        19 => "dziewiętnasto",
        20 => "dwudziesto",
        30 => "trzydziesto",
        40 => "czterdziesto",
        50 => "pięcdziesięcio",
        60 => "sześćdziesięcio",
        70 => "siedemdziesięcio",
        80 => "osiemdziesięcio",
        90 => "dziewięćdziesięcio",
        100 => "stu"
    );

    protected $zeroes = array(
        2 => "setne",
        3 => "tysięczne",
        4 => "tysięczne",
        5 => "tysięczne",
        6 => "milionowe",
        7 => "milionowe",
        8 => "milionowe",
        9 => "miliardowe",
        10 => "miliardowe",
        11 => "miliardowe",
        12 => "bilionowe",
        13 => "bilionowe",
        14 => "bilionowe"
    );

    protected $hundredsPrefixes = array(
        1 => "",
        2 => "dwu",
        3 => "trzech",
        4 => "czterech",
        5 => "pięć",
        6 => "sześć",
        7 => "siedem",
        8 => "osiem",
        9 => "dziewięć"
    );

    protected $cardinal;
    protected $complexSuffix = '';

    /**
     * @inheritdoc
     */
    public function format($number)
    {
        $this->complexSuffix = '';
        $this->cardinal = explode(' ', $this->getCardinal($number));

        return $this->prepare($number);
    }

    private function prepare($number)
    {
        if ($number < 20) {
            return $this->simple[$number];
        }

        $numberLength = strlen($number);
        $ordinal = array();

        $multiplier = 1;
        $zeroesNb = 0;

        // try to get last two digits
        $lastTwoDigits = substr($number, -2, 2);

        if (isset($this->simple[$lastTwoDigits])) {
            $ordinal[] = $this->simple[$lastTwoDigits];
        } else {
            // something more complex
            for ($i=1; $i <= $numberLength; $i++) {
                $digit = substr($number, -$i, 1);

                if ($digit) {
                    if (isset($this->simple[$digit*$multiplier])) {
                        $ordinal[] = $this->simple[$digit*$multiplier];
                    } elseif ($zeroesNb == 2) {
                        $ordinal[] = $this->hundredsPrefixes[$digit].$this->zeroes[$zeroesNb];
                        break;
                    } elseif ($zeroesNb > 2) {
                        $this->complexSuffix = $this->zeroes[$zeroesNb];
                        $number = substr($number, 0, -3);
                        $ordinal = array_merge($ordinal, $this->prepareComplex($number));
                        break;
                    }
                } elseif (!count($ordinal)) {
                    $zeroesNb++;
                }

                $multiplier *= 10;
            }
        }

        $cardinal = $this->cardinal;

        if ($this->complexSuffix !== '' || ($numberLength > 3 && $cardinal[0] === 'jeden')) {
            unset($cardinal[0]);
            $cardinal = array_values($cardinal);
        }

        foreach ($ordinal As $key => $word) {
            $cardinal[count($cardinal)-($key+1)] = $word;
        }

        $ordinal = $cardinal;

        return implode(' ', $ordinal);
    }

    private function prepareComplex($number)
    {
        if ($number < 20) {
            return array($this->complex[$number].$this->complexSuffix);
        }

        $numberLength = strlen($number);
        $ordinal = array();

        $multiplier = 1;

        for ($i=1; $i <= $numberLength; $i++) {
            $digit = substr($number, -$i, 1);
            if ($digit && isset($this->complex[$digit*$multiplier])) {
                $ordinal[] = $this->complex[$digit*$multiplier].(!count($ordinal) ? $this->complexSuffix : '');
            }
            $multiplier *= 10;
        }

        return $ordinal;
    }
}
