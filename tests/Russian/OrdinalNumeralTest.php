<?php
namespace morphos\test\Russian;
require __DIR__.'/../../vendor/autoload.php';

use morphos\NumeralCreation;
use morphos\Russian\Cases;
use morphos\Russian\OrdinalNumeral;

class OrdinalNumeralTest extends \PHPUnit_Framework_TestCase {
    protected $ordinal;

    public function setUp() {
        $this->ordinal = new OrdinalNumeral();
    }

    /**
     * @dataProvider numbersProvider
     */
    public function testGetCases($number, $gender, $case, $case2, $case3, $case4, $case5, $case6) {
        $this->assertEquals(array(
            Cases::IMENIT => $case,
            Cases::RODIT => $case2,
            Cases::DAT => $case3,
            Cases::VINIT => $case4,
            Cases::TVORIT => $case5,
            Cases::PREDLOJ => $case6,
        ), $this->ordinal->getCases($number, $gender));
    }

    public function numbersProvider() {
        return array(
            array(1, NumeralCreation::MALE, 'первый', 'первого', 'первому', 'первый', 'первым', 'о первом'),
            array(1, NumeralCreation::FEMALE, 'первая', 'первой', 'первой', 'первую', 'первой', 'о первой'),
            array(201, NumeralCreation::MALE, 'двести первый', 'двести первого', 'двести первому', 'двести первый', 'двести первым', 'о двести первом'),
            array(344, NumeralCreation::MALE, 'триста сорок четвертый', 'триста сорок четвертого', 'триста сорок четвертому', 'триста сорок четвертый', 'триста сорок четвертым', 'о триста сорок четвертом'),
            array(1007, NumeralCreation::MALE, 'тысяча седьмой', 'тысяча седьмого', 'тысяча седьмому', 'тысяча седьмой', 'тысяча седьмым', 'о тысяча седьмом'),
            array(3651, NumeralCreation::MALE, 'три тысячи шестьсот пятьдесят первый', 'три тысячи шестьсот пятьдесят первого', 'три тысячи шестьсот пятьдесят первому', 'три тысячи шестьсот пятьдесят первый', 'три тысячи шестьсот пятьдесят первым', 'о три тысячи шестьсот пятьдесят первом'),
            array(9999, NumeralCreation::MALE, 'девять тысяч девятьсот девяносто девятый', 'девять тысяч девятьсот девяносто девятого', 'девять тысяч девятьсот девяносто девятому', 'девять тысяч девятьсот девяносто девятый', 'девять тысяч девятьсот девяносто девятым', 'о девять тысяч девятьсот девяносто девятом'),
            array(1234567890, NumeralCreation::MALE,
                'один миллиард двести тридцать четыре миллиона пятьсот шестьдесят семь тысяч восемьсот девяностый',
                'один миллиард двести тридцать четыре миллиона пятьсот шестьдесят семь тысяч восемьсот девяностого',
                'один миллиард двести тридцать четыре миллиона пятьсот шестьдесят семь тысяч восемьсот девяностому',
                'один миллиард двести тридцать четыре миллиона пятьсот шестьдесят семь тысяч восемьсот девяностый',
                'один миллиард двести тридцать четыре миллиона пятьсот шестьдесят семь тысяч восемьсот девяностым',
                'об один миллиард двести тридцать четыре миллиона пятьсот шестьдесят семь тысяч восемьсот девяностом',
            ),
            array(1000, NumeralCreation::MALE, 'тысячный', 'тысячного', 'тысячному', 'тысячный', 'тысячным', 'о тысячном'),
            array(1000000000, NumeralCreation::MALE, 'миллиардный', 'миллиардного', 'миллиардному', 'миллиардный', 'миллиардным', 'о миллиардном'),
            array(1000000090, NumeralCreation::MALE, 'миллиард девяностый', 'миллиард девяностого', 'миллиард девяностому', 'миллиард девяностый', 'миллиард девяностым', 'о миллиард девяностом'),
        );
    }
}