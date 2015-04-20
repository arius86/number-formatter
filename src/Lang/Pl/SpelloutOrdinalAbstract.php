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

abstract class SpelloutOrdinalAbstract implements SpelloutInterface
{
    use SpelloutTrait;

    protected $complex = [
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
        19 => "dziewiętnasto",
        20 => "dwudziesto",
        30 => "trzydziesto",
        40 => "czterdziesto",
        50 => "pięćdziesięcio",
        60 => "sześćdziesięcio",
        70 => "siedemdziesięcio",
        80 => "osiemdziesięcio",
        90 => "dziewięćdziesięcio",
        100 => "stu",
        200 => "dwustu",
        300 => "trzystu",
        400 => "czterystu",
        500 => "pięćset",
        600 => "sześćset",
        700 => "siedemset",
        800 => "osiemset",
        900 => "dziewięćset"
    ];

    protected $hundredsPrefixes = [
        1 => "",
        2 => "dwu",
        3 => "trzech",
        4 => "czterech",
        5 => "pięć",
        6 => "sześć",
        7 => "siedem",
        8 => "osiem",
        9 => "dziewięć"
    ];

    protected $cardinal;
    protected $complexSuffix = '';
    protected $complexity = 0;

    protected $debugNum;

    /**
     * @inheritdoc
     */
    public function format($number)
    {
        $this->complexSuffix = '';
        $this->complexity = 0;
        $this->cardinal = $this->getCardinalArray($number);
        $this->cardinal[0] = $this->fixFeminineCardinal($this->cardinal[0]);

        return $this->prepare($number);
    }

    /**
     * Due the different versions of ICU available, we need to fix first word from complex cardinal numbers.
     * Sometimes they may be feminine (and this is incorrect in polish language).
     *
     * @param string $number
     * @return string
     */
    protected function fixFeminineCardinal($number)
    {
        $feminineToMasculine = [
            'jedna' => 'jeden',
            'dwie' => 'dwa'
        ];

        return isset($feminineToMasculine[$number]) ? $feminineToMasculine[$number] : $number;
    }

    private function prepare($number)
    {
        $this->debugNum = $number;


        if ($number < 20) {
            return $this->simple[$number];
        }

        $numberLength = strlen($number);

        $ordinal = $this->prepareComplex($number);
        $cardinal = $this->cardinal;

        if ($numberLength > 3 && $cardinal[0] === 'jeden') {
            unset($cardinal[0]);
        }

        if ($this->complexSuffix !== '') {
            unset($cardinal[count($cardinal) - 1]);
        }

        $cardinal = array_values($cardinal);

        foreach ($ordinal As $key => $word) {
            $cardinal[count($cardinal) - ($key + 1)] = $word;
        }

        $ordinal = $cardinal;

        return implode(' ', $ordinal);
    }

    private function prepareComplex($number, $mode = 'simple')
    {
        if ($this->complexity) {
            $number = substr($number, 0, ($this->complexity * -1));
        }

        if ($number == 1) {
            return [$this->complexSuffix];
        }

        if ($number < 20) {
            return [$this->complex[$number] . $this->complexSuffix];
        }

        // try to get last two digits
        $modeArray = $this->$mode;
        $lastTwoDigits = substr($number, -2, 2);

        if (isset($this->simple[$lastTwoDigits])) {
            $ordinal = [$modeArray[$lastTwoDigits] . $this->complexSuffix];
        } else {
            $ordinal = $this->loopByDigits($number, $mode);
        }

        return $ordinal;
    }

    private function loopByDigits($number, $mode = 'simple')
    {
        $modeArray = $this->$mode;
        $numberLength = strlen($number);
        $ordinal = [];
        $multiplier = 1;
        $zeroesNb = 0;

        echo 'test';

        for ($i = 1; $i <= $numberLength; $i++) {
            $digit = substr($number, -$i, 1);

            if ($digit) {
                if (isset($modeArray[$digit * $multiplier])) {
                    $ordinal[] = $modeArray[$digit * $multiplier] . (count($ordinal) ? '' : $this->complexSuffix);
                } elseif ($zeroesNb == 2) {
                    $ordinal[] = $this->hundredsPrefixes[$digit] . $this->zeroes[$zeroesNb];
                    break;
                } elseif ($zeroesNb > 2) {
                    $complexity = floor($zeroesNb / 3) * 3;

                    $this->complexSuffix = $this->zeroes[$complexity];
                    $this->complexity = $complexity;

                    $ordinal = $this->prepareComplex($number, 'complex');
                    break;
                }
            } elseif (!count($ordinal) && $mode == 'simple') {
                $zeroesNb++;
            }

            $multiplier *= 10;
        }

        return $ordinal;
    }

    public function foo() {
        return 'bar';
    }
}