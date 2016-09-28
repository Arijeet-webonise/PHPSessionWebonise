<?php
	interface CurrencyObserver{
		public function getcurrency();
	}
	/**
	* Rupees Object
	*/
	class Rupees implements CurrencyObserver
	{
		private $amount;
		function __construct($money)
		{
			$this->amount=$money;
		}
		/*
		*	Return Amount in Rupees Format
		*/
		function getcurrency(){
			return "₹".$this->amount;
		}
		public static function dollortoRupees($amount){
			return $amount/66.66;
		}
		public static function Rupeestodollor($amount){
			return $amount*66.66;
		}
	}
	/**
	* Doller Object
	*/
	class doller implements CurrencyObserver
	{
		private $amount;
		function __construct($money)
		{
			$this->amount=$money;
		}
		/*
		*	Return Amount in doller Format
		*/
		function getcurrency(){
			return "$".$this->amount;
		}
		public static function Rupeestodollor($amount){
			return $amount*66.66;
		}
		public static function dollortoRupees($amount){
			return $amount/66.66;
		}
	}
	/**
	* Euro Object
	*/
	class Euro implements CurrencyObserver
	{
		private $amount;
		function __construct($money)
		{
			$this->amount=$money;
		}
		/*
		*	Return Amount in Euro Format
		*/
		function getcurrency(){
			return "€".$this->amount;
		}
		public static function dollortoeuro($amount){
			return $amount*1.12;
		}
		public static function eurotodollor($amount){
			return $amount/1.12;
		}
	}
	/**
	* Pound Object
	*/
	class Pound implements CurrencyObserver
	{
		private $amount;
		function __construct($money)
		{
			$this->amount=$money;
		}
		/*
		*	Return Amount in Pound Format
		*/
		function getcurrency(){
			return "£".$this->amount;
		}
		public static function dollortoPound($amount){
			return $amount*1.29;
		}
		public static function Poundtodollor($amount){
			return $amount/1.29;
		}
	}
	/**
	* Bitcoin Object
	*/
	class Bitcoin implements CurrencyObserver
	{
		private $amount;
		function __construct($money)
		{
			$this->amount=$money;
		}
		/*
		*	Return Amount in BitCoin Format
		*/
		function getcurrency(){
			return "Ƀ".$this->amount;
		}
		public static function dollortoBitcoin($amount){
			return $amount*607.76;
		}
		public static function Bitcointodollor($amount){
			return $amount/607.76;
		}
	}
	/**
	* Curreny Factory
	*/
	class CurrenyFactory
	{
		
		public static function createRupees($amount)
		{
			return new Rupees($amount);
		}
		public static function createdoller($amount)
		{	
			return new doller($amount);
		}
		public static function createEuro($amount)
		{	
			return new Euro($amount);
		}
		public static function createPound($amount)
		{	
			return new Pound($amount);
		}
		public static function createBitcoin($amount)
		{	
			return new Bitcoin($amount);
		}
	}
?>