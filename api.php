<?php require_once("template/header.php"); ?>

<?php
function update($db, $cart,$pid){
	if(isset($_REQUEST['quantity']))
		$value=$_REQUEST['quantity'];
	else
		throw new Exception("Enter Product Name", 1);
	$ret=$db->updatedata("cart","quantity='$value'","productid='$pid'");
	fetch($db,$cart);
	return $ret;
}

function fetch($db,$cart){
	$ret=$db->getdata("cart","productid,quantity");
	if ($ret->num_rows > 0) {
		$cart=array();
		while($row = $ret->fetch_assoc()) {
			$tempcart=(object)array('product_id'=>$row['productid'],'quantity'=>$row['quantity']);
			array_push($cart, $tempcart);
		}
		echo json_encode($cart);
		return true;
	} else {
		echo '{"error":"Product Not Found"}';
		return false;
	}
}

function delete($db,$cart,$pid){
	$ret=$db->deletedata("cart","productid=".$pid);

	unset($cart[$_REQUEST['pid']]);
	fetch($db,$cart);
	return $ret;
}

function checkout($db,$cart){
	$a=true;
	foreach ($cart as $product) {
		if($db->insertdata("cart","productid,quantity",$product->product_id.",".$product->Quantity)!=true){
			$a=false;
		;}
	}
	return $a;
}
function method($db,$cart,$method){
	switch ($method) {
		case 'checkout':
			checkout($db,$cart);
			break;
		case 'fetch':
			return fetch($db,$cart);
			break;
		case 'update':
		if(isset($_REQUEST['pid']))
			return update($db,$cart,$_REQUEST['pid']);
		else
			throw new Exception("Enter Product Name", 1);
			break;
		case 'delete':
		if(isset($_REQUEST['pid']))
			return delete($db,$cart,$_REQUEST['pid']);
		else
			throw new Exception("Enter Product Name", 1);
			return false;
			break;
	}
}

function main(){

	if(isset($_REQUEST["cart"]))
		$cart=json_decode($_REQUEST["cart"]);
	else
		$cart=array();

	$db=SQLFactory::create("MySql");
	$db->connect("phpsession",'','root');

	if(isset($_REQUEST["method"]))
		$method=$_REQUEST["method"];
	method($db,$cart,$method);
}

main();
?>

<?php require_once("template/footer.php"); ?>
