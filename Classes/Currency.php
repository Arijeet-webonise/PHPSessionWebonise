<?php
	interface currency{
		public function getcurrency();
	}

	/**
	* 
	*/
	class Ruppees implements currency
	{
		private $amount;
		function __construct($money)
		{
			$this->amount=$money;
		}
		function getcurrency(){
			return "₹".$this->amount;
		}
		public static function dollortoruppees($amount){
			return $amount/66.66;
		}
		public static function ruppeestodollor($amount){
			return $amount*66.66;
		}
	}

	class doller implements currency
	{
		private $amount;
		function __construct($money)
		{
			$this->amount=$money;
		}
		function getcurrency(){
			return "$".$this->amount;
		}
		public static function ruppeestodollor($amount){
			return $amount*66.66;
		}
		public static function dollortoruppees($amount){
			return $amount/66.66;
		}
	}

	class Euro implements currency
	{
		private $amount;
		function __construct($money)
		{
			$this->amount=$money;
		}
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

	class Pound implements currency
	{
		private $amount;
		function __construct($money)
		{
			$this->amount=$money;
		}
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

	class Bitcoin implements currency
	{
		private $amount;
		function __construct($money)
		{
			$this->amount=$money;
		}
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
		
		public static function create($type,$amount)
		{
			switch ($type) {
				case 'rs':
					return new Ruppees($amount);
					break;
				case 'usd':
					return new doller($amount);
					break;
				case 'euro':
					return new Euro($amount);
					break;
				case 'pou':
					return new Pound($amount);
					break;
				case 'bit':
					return new Bitcoin($amount);
					break;
				
				default:
					throw new Exception("Invalid Money", 1);
					return false;
					break;
			}
		}

		public static function getamount($type,$amount){
			switch ($type) {
				case 'rs':
					return Ruppees::ruppeestodollor($amount);
					break;
				case 'usd':
					return $amount;
					break;
				case 'euro':
					return Euro::eurotodollor($amount);
					break;
				case 'pou':
					return Pound::Poundtodollor($amount);
					break;
				case 'bit':
					return Bitcoin::Bitcointodollor($amount);
					break;
				
				default:
					throw new Exception("Invalid Money", 1);
					return false;
					break;
			}
		}
	}
?>
