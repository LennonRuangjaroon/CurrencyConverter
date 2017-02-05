<?php

/**
 * The CurrencyConverter
 * 
 * @author Lennon
 */
class CurrencyConverter {

	protected $exchangeRate = array('USD' => 40, "EUR" => 50);

	/**
	* This is Converter.
	* Converter currency to THB
	* @author Lennon
	*/
	public function converter($amount, $currencyTo) {
		$this->vaildInput($amount, $currencyTo);

		if(is_numeric($amount)) {
			return ($amount * $this->getExchangeRate($currencyTo));
		} else {
			throw new InvalidArgumentException("Amount not numeric"); 
		}
	}

	private function getExchangeRate($currencyTo) {
		try{
			return $this->exchangeRate[$currencyTo];
		} catch (Exception $e) {
			throw new InvalidArgumentException("CurrencyTo is not found");
		}
		
	}

	private function vaildInput($amount, $currencyTo){
		if($amount == null || $currencyTo == null){
			throw new InvalidArgumentException("Amount is not null and CurrencyTo is not null");
		}
	}

}



?>