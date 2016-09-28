<?php
	use PHPUnit\Framework\TestCase;
	require_once('Classes\sql.php');

	class StackTest extends TestCase
	{
		/**
		* @dataProvider connectProvider
		*/
		public function testconnect($db)
		{
			$connect=$db->connect("phpsession",'','root');

			$this->assertTrue($connect);
		}

	    public function connectProvider(){
	    	return [[SQLFactory::createMySql("MySql")]];
	    }

	    /**
		* @dataProvider checkoutProvider
		*/
		public function testcheckout($cart){
			$a=true;
			$db=SQLFactory::createMySql("MySql");
			$db->connect("phpsession",'','root');
			foreach ($cart as $product) {
				if($db->insertdata("cart","productid,quantity",$product->product_id.",".$product->Quantity)!=true){
					$a=false;
				}
			}
			$this->assertTrue($a);
		}		

		public function checkoutProvider()
	    {
	        return [
	            [json_decode('[{"product_id":2,"Quantity":"12"}]')],
	            [json_decode('[{"product_id":2,"Quantity":"12"},{"product_id":1,"Quantity":"3"}]')]
	        ];
	    }
	    
	    /**
		* @dataProvider fetchProvider
		*/
	    public function testfetch($expected){
	    	$a;
	    	$db=SQLFactory::createMySql("MySql");
			$db->connect("phpsession",'','root');
	    	$ret=$db->getdata("cart","productid,quantity");
			if ($ret->num_rows > 0) {
				$cart=array();
				while($row = $ret->fetch_assoc()) {
					$tempcart=(object)array('product_id'=>$row['productid'],'quantity'=>$row['quantity']);
					array_push($cart, $tempcart);
				}
			}
			$this->assertEquals($expected,$cart);
	    }

	    function fetchProvider(){
	    	return [
	    		[array((object)array('product_id'=>'2','quantity'=>'12'),(object)array('product_id'=>'2','quantity'=>'12'),(object)array('product_id'=>'1','quantity'=>'3'))]
	    	];
	    }
	}
?>
