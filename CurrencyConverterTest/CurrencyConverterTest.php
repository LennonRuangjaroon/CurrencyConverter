<?php
require_once ('../vendor/autoload.php');
require_once ('../CurrencyConverter/CurrencyConverter.php');

/**
 * CurrencyConverter Test
 *
 * @author Lennon
 */
class CurrencyConverterTest extends PHPUnit\Framework\TestCase {


	protected $currencyConverter;

	/**
	* @before
	*/
	protected function setUp() {
		$this->currencyConverter = new CurrencyConverter();
	}

	/**
	* @test
	*/
    public function convert_currency_10usd_to_thb() {
        $this->assertCurrencyConverter(10, "USD", 400);
    }	

   	/**
	* @test
	*/
    public function convert_currency_20usd_to_thb() {
        $this->assertCurrencyConverter(20, "USD", 800);
    }	
	
	/**
	* @test
	*/
    public function convert_currency_50usd_to_thb() {
		$this->assertCurrencyConverter(50, "USD", 2000);
    }

    /**
	* @test
	* @expectedException InvalidArgumentException
	*/
    public function convert_currency_worng_amount_currency_exception_throw() {
		$this->currencyConverter->converter("worng", "USD");
    }

    /**
	* @test
	*/
    public function convert_currency_50eur_to_thb() {
		$this->assertCurrencyConverter(10, "EUR", 500);
    }

    /**
	* @test
	* @expectedException InvalidArgumentException
	*/
    public function convert_currency_with_wrong_currency_type_exception_throw(){
    	$this->currencyConverter->converter(10, "worng");
    }

    /**
	* @test
	* @expectedException InvalidArgumentException
	*/
    public function covert_currency_with_zero_exception_throw(){
		$this->currencyConverter->converter(0, 0);
    }

    /**
	* @test
	* @expectedException InvalidArgumentException
	*/
    public function convert_currency_with_null_input() {
		$this->currencyConverter->converter(null, null);
    }

   	private function assertCurrencyConverter($amount, $currency, $excepted){
		$result = $this->currencyConverter->converter($amount, $currency);
        $this->assertEquals($result, $excepted);
    }

}

?>