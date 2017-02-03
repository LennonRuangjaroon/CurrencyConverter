<?php
require_once ('PHPUnit/Framework/TestCase.php');
require_once ('../tdd/CurrencyConverter/CurrencyConverter.php');

/**
 * CurrencyConverter Test
 * 
 * @author Lennon
 */
class CurrencyConverterTest extends PHPUnit_Framework_TestCase {

	protected $currencyConverter;

	protected function setUp() {
		$this->currencyConverter = new CurrencyConverter();
	}

    function test_can_conver() {
    	$result = $this->currencyConverter->converter("100", "THB", "USD", "40");
        $this->assertEquals($result, 400);
    }	
	
}



?>