<?php

require("vendor/autoload.php");

use PHPUnit\Framework\TestCase;
use DV\DataValidator as Data;

class DataValidatorTest extends TestCase
{
    /**
     * CPF TESTS
    */
    public function testShouldReturnFalseWhenCpfHasMoreDigits()
    {
        $this->assertFalse(Data::isCpf("56355065523"));
    }

    public function testShouldReturnFalseWhenCpfHasFewerDigits()
    {
        $this->assertFalse(Data::isCpf("5635506552"));
    }

    public function testShouldReturnFalseWhenCpfDoesNotValid()
    {
        $this->assertFalse(Data::isCpf("189.879.620-71"));
    }

    public function testShouldReturnTrueWhenCpfIsValid()
    {
        $this->assertTrue(Data::isCpf("189.879.680-73"));
    }

    public function testShouldReturnTrueifTheCpfWithCorrectPunctuation()
    {
        $this->assertEquals(Data::cpfWithScore("18987968073"), "189.879.680-73");
    }

    public function shouldReturnFalseIfTheCpfContainsAnyCharacterThatIsNotANumber()
    {
        $this->assertFalse(Data::isCpf("189.879.620-7A"));
    }

    /**
     * CNPJ TESTS
     */
    public function testShouldReturnFalseWhenCnpjHasMoreDigits()
    {
        $this->assertFalse(Data::isCnpj("069905900001232"));
    }

    public function testShouldReturnFalseWhenCnpjHasFewerDigits()
    {
        $this->assertFalse(Data::isCnpj("0699059000012"));
    }

    public function testShouldReturnFalseWhenCnpjDoesNotValid()
    {
        $this->assertFalse(Data::isCnpj("03.290.590/0001-23"));
    }

    public function testShouldReturnTrueWhenCnpjIsValid()
    {
        $this->assertTrue(Data::isCnpj("06.990.590/0001-23"));
    }

    public function testShouldReturnTrueifTheCnpjWithCorrectPunctuation()
    {
        $this->assertEquals(Data::cnpjWithScore("06990590000123"), "06.990.590/0001-23");
    }

    public function shouldReturnFalseIfTheCnpjContainsAnyCharacterThatIsNotANumber()
    {
        $this->assertTrue(Data::isCnpj("06.990.590/0001-2a"));
    }

    /**
     * NAME TESTS
     */

    public function testShouldReturnFalseWhenNameIsEmpty() 
    {
        $this->assertFalse(Data::isName(""));
    }

    public function testShouldReturnFalseWhenNameIsNull() 
    {
        $this->assertFalse(Data::isName(null));
    }

    public function testShouldReturnFalseWhenNameIsNumber() 
    {
        $this->assertFalse(Data::isName("123"));
    }

    public function testShouldReturnTrueWhenNameIsValid() 
    {
        $this->assertTrue(Data::isName("João"));
    }

    public function testShouldReturnTrueWhenNameIsValidWithSpaces() 
    {
        $this->assertTrue(Data::isName("João da Silva"));
    }
}