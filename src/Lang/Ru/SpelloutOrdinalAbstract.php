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

use Arius\SpelloutInterface;
use Arius\SpelloutTrait;

abstract class SpelloutOrdinalAbstract implements SpelloutInterface
{
    use SpelloutTrait;

    protected $complex = [
        1 => "",
        2 => "двух", 	
        3 => "трёх",	
        4 => "четырёх",	
        5 => "пяти",	
        6 => "шести",	
        7 => "семи",	
        8 => "восьми",	
        9 => "девяти",	
        10 => "десяти", 			
        11 => "одиннадцати", 	
        12 => "двенадцати",		
        13 => "тринадцати",		
        14 => "четырнадцати",	
        15 => "пятнадцати", 	
        16 => "шестнадцати",	
        17 => "семнадцати",		
        18 => "восемнадцати",	
        19 => "девятнадцати",	
        20 => "двадцати",
        30 => "тридцати",
        40 => "сороковой", 
        50 => "пятидесяти",
        60 => "шестидесяти",
        70 => "семидесяти",
        80 => "восмидесяти",
        90 => "девиностй",
        100 => "сто",
        200 => "двухсотый", 	// $hundredsPrefixes[2] + $zeroes[2] 
        300 => "трёхсотый",	// $hundredsPrefixes[3] + $zeroes[2] 
        400 => "четырёхсотый",	// $hundredsPrefixes[4] + $zeroes[2] 
        500 => "пятисотый",	// $hundredsPrefixes[5] + $zeroes[2] 
        600 => "шестисотый",	// $hundredsPrefixes[6] + $zeroes[2] 
        700 => "семисотый",	// $hundredsPrefixes[7] + $zeroes[2] 
        800 => "восьмисотый",	// $hundredsPrefixes[8] + $zeroes[2] 
        900 => "девятисотый",  	// $hundredsPrefixes[9] + $zeroes[2]       
    ];

    protected $hundredsPrefixes = [
        1 => "",
        2 => "двух",
        3 => "трёх",
        4 => "четырёх",
        5 => "пяти",
        6 => "шести",
        7 => "семи",
        8 => "восьми",
        9 => "девяти"
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
     * Sometimes they may be feminine (and this is incorrect in russian language).
     *
     * @param string $number
     * @return string
     */
    protected function fixFeminineCardinal($number)
    {
        $feminineToMasculine = [
            'одна' => 'один',
            'два' => 'две'
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

        if ($numberLength > 3 && $cardinal[0] === 'один') {
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
}
?>
