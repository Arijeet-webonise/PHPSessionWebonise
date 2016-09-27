<?php require_once("template/header.php"); ?>

<?php
function update($db, $cart){
	if(isset($_REQUEST['pid']))
		$pid=$_REQUEST['pid'];
	else
		throw new Exception("Enter Product Name", 1);
	if(isset($_REQUEST['quantity']))
		$value=$_REQUEST['quantity'];
	else
		throw new Exception("Enter Product Name", 1);
	$ret=$db->updatedata("cart","quantity='$value'","productid='$pid'");
	fetch($db,$cart);
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
	} else {
		echo '{"error":"Product Not Found"}';
	}
}

function delete($db,$cart){
	$ret=$db->deletedata("cart","productid=".$_REQUEST['pid']);

	unset($cart[$_REQUEST['pid']]);
	fetch($db,$cart);
}
	if(isset($_REQUEST["method"]))
		$method=$_REQUEST["method"];

	if(isset($_REQUEST["cart"]))
		$cart=json_decode($_REQUEST["cart"]);
	else
		$cart=array();

	$db=SQLFactory::create("MySql");
	$db->connect("phpsession",'','root');

	switch ($method) {
		case 'checkout':
			foreach ($cart as $product) {
				$db->insertdata("cart","productid,quantity",$product->product_id.",".$product->Quantity);
			}
			break;
		case 'fetch':
			fetch($db,$cart);
			break;
		case 'update':
			update($db,$cart);
			break;
		case 'delete':
			delete($db,$cart);
			break;
	}
?>

<?php require_once("template/footer.php"); ?>
