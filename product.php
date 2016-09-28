<?php 
	include('templete/header.php');
	require_once("Classes/Currency.php");
	$list=array('usd','rs','euro','pou','bit');
	$db=SQLFactory::create("MySql");
	$db->connect('phpsession','','root');
	$pid=$_REQUEST['pid'];
	$ret=$db->getdata('product',"*","pid='$pid'");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Product Upload</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
		<?php while ($row=$ret->fetch_assoc()) { 
		$price=array(
			'usd'=>CurrenyFactory::createdoller($row['price']),
			'rs'=>CurrenyFactory::createRupees(Rupees::dollortoRupees($row['price'])),
			'euro'=>CurrenyFactory::createEuro(Euro::dollortoeuro($row['price'])),
			'pou'=>CurrenyFactory::createPound(Pound::dollortoPound($row['price'])),
			'bit'=>CurrenyFactory::createBitcoin(Bitcoin::dollortoBitcoin($row['price']))
		);
	?>
	<div id="product" class="container">
		<div class="col-sm-6" id="image">
			<img src="<?php echo $row['image']; ?>">
		</div>
		<div class="col-sm-6" id="product-info">
			<h3><?= $row['pname'] ?></h3>
			<div class="row">
				<strong>Price:</strong><span id="product-price">
				<?php 
				foreach ($price as $pric) {
					echo '<span class="row">'.$pric->getcurrency()."</span>"; 
				}?>
					</span>
			</div>
			<div class="row well">
				<?= $row['desp'] ?>
			</div>
		</div>
	</div>
			<?php  }  ?>
<?php include('templete/footer.php'); ?>
