<?php
error_reporting(E_ERROR | E_PARSE);
/*inicilisation*/
	function xml2json($xml){
		$xmlparser = xml_parser_create();
		xml_parse_into_struct($xmlparser,$xml,$values);
		xml_parser_free($xmlparser);
			// var_dump($value['tag'].'-'.$value['value'].'/'.$value['type']);
		$i=0;
		$flag=false;
		$j="{'Product':[{"
		foreach ($values as $value) {
			if($value['tag']=="Product"){
				if($value['type']=="open"){
					$flag=true;
				}else{
					$flag=false;
				}
			}
			if($i!=0){
				$j=',';
				$i++;
			}
		}
		$j=$j."}]}";
	}
	$requ=$_REQUEST['requ'];
	if(isset($_REQUEST['json'])){
		$json=json_decode($_REQUEST['json']);
	}elseif (isset($_REQUEST['xml'])) {
		$json=xml2json($_REQUEST['xml']);
	}else{
		$json=json_decode('{"Product":[{"Name":"Legend of Zelda","ID":12345,"Price":124.5}],"Cart":[{"ID":12345,"OrderID":234,"Quantity":1}],"Totel":124.5}');
	}
	// else{
	// 	$json=json_decode($_REQUEST['json']);
	// }

	function viewjson($jsons){
		printf(json_encode($jsons));
	}
	function viewxml($jsons){
		$xml="<xml><Product>";
		foreach ($jsons->Product as $key) {
			$xml=$xml."<Name>".$key->Name."</Name>";
			$xml=$xml."<ID>".$key->ID."</ID>";
			$xml=$xml."<Price>".$key->Price."</Price>";
		}
		$xml=$xml."</Product><Cart>";
		foreach ($jsons->Cart as $key) {
			$xml=$xml."<ID>".$key->ID."</ID>";
			$xml=$xml."<OrderID>".$key->OrderID."</OrderID>";
			$xml=$xml."<Quantity>".$key->Quantity."</Quantity>";
		}
		$xml=$xml."</Cart><Totel>".$jsons->Totel."</Totel>";
		$xml=$xml."</xml>";
		printf($xml);
	}
	function view($jsons){
		if(isset($_SERVER['CONTENT_TYPE'])){
			if($_SERVER['CONTENT_TYPE']=="application/xml"){
				viewxml($jsons);
			}else{
				viewjson($jsons);
			}
		}
		else{
			viewjson($jsons);
		}
	}
	/*Product API Function*/
	function addProduct($jsons,$name,$Price){    //$json=addProduct($json,"Hi",500.0);
		$Prod=$jsons->Product;
		$num=count($Prod);
		$Prod[$num]->Name=$name;
		$Prod[$num]->ID=rand ();
		$Prod[$num]->Price=$Price;
		$jsons->Product=$Prod;
		return $jsons;
	}
	function modifyProduct($jsons,$name,$ID,$Price){	//$json=modifyProduct($json,"Legend of Zelda, Ocarina of Time",12345,500.0);
		$Prods=$jsons->Product;
		foreach ($Prods as $key) {
			if($key->ID==$ID){
				$key->Name=$name;
				$key->Price=$Price;
			}
			$i++;
		}
		$jsons->Product=$Prods;
		return $jsons;
	}
	function delProduct($jsons,$ID){		//$json=delProduct($json,12345);
		$Prods=$jsons->Product;
		$i=0;
		foreach ($Prods as $key) {
			if($key->ID==$ID){
				unset($Prods[$i]);
			}
			$i++;
		}
		$jsons->Product=$Prods;
		return $jsons;
	}

	/*Cart API Function*/
	function gettotel($jsons){
		$totel=0;
		$Carts=$jsons->Cart;
		foreach ($Carts as $Cart) {
			# code...  
			$Prod=$jsons->Product;
			foreach ($Prod as $key) {
				if($Cart->ID==$key->ID){
					$totel=$totel+$key->Price;
					break;
				}
			}
		}
		return $totel;
	}
	function addCart($jsons,$ID,$Quantity){    
		$Cart=$jsons->Cart;
		$num=count($Cart);
		$Cart[$num]->ID=$ID;
		$Cart[$num]->OrderID=rand ();
		$Cart[$num]->Quantity=$Quantity;
		$jsons->Cart=$Cart;
		$jsons->Totel=gettotel($jsons);
		return $jsons;
	}
	function modifyCart($jsons,$ID,$Quantity){	
		$Carts=$jsons->Cart;
		foreach ($Carts as $key) {
			if($key->OrderID==$ID){
				$key->Quantity=$Quantity;
			}
		}
		$jsons->Cart=$Carts;
		$jsons->Totel=gettotel($jsons);
		return $jsons;
	}
	function delCart($jsons,$ID){		
		$Carts=$jsons->Cart;
		$i=0;
		foreach ($Carts as $key) {
			if($key->OrderID==$ID){
				unset($Carts[$i]);
			}
			$i++;
		}
		$jsons->Cart=$Carts;
		$jsons->Totel=gettotel($jsons);
		return $jsons;
	}

	/*Ground Work*/
	if($requ=='view'){
		view($json);
	}
	else if($requ=='addProduct'){
		if(isset($_REQUEST['name'])&&isset($_REQUEST['Price'])){	
			$json=addProduct($json,$_REQUEST['name'],(float)$_REQUEST['Price']);
			view($json);
		}
	}else if($requ=='modifyProduct'){
		if(isset($_REQUEST['name'])&&isset($_REQUEST['Price'])&&isset($_REQUEST['ID'])){	
			$json=modifyProduct($json,$_REQUEST['name'],$_REQUEST['ID'],(float)$_REQUEST['Price']);
			view($json);
		}
	}else if($requ=='removeProduct'){
		if(isset($_REQUEST['ID'])){	
			$json=delProduct($json,$_REQUEST['ID']);
			view($json);
		}
	}
	else if($requ=='addCart'){
		if(isset($_REQUEST['CID'])&&isset($_REQUEST['Quantity'])){	
			$json=addCart($json,$_REQUEST['CID'],$_REQUEST['Quantity']);
			view($json);
		}
	}else if($requ=='modifyCart'){
		if(isset($_REQUEST['Quantity'])&&isset($_REQUEST['CID'])){	
			$json=modifyCart($json,$_REQUEST['CID'],$_REQUEST['Quantity']);
			view($json);
		}
	}else if($requ=='removeCart'){
		if(isset($_REQUEST['CID'])){	
			$json=delCart($json,$_REQUEST['CID']);
			view($json);
		}
	}else{
		$error=json_decode('{"error":"Request function not found"}');
		printf(json_encode($error));
	}

?>