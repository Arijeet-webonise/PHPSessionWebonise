<?php
include('templete/header.php');
try{
	$db=SQLFactory::createMySql("MySql");
	$db->connect('phpsession','','root');
	$ret=$db->insertdata('product',"pname, price, desp","'".$_REQUEST['pname']."',".$_REQUEST['price'].",'".$_REQUEST['Description']."'");
	if(isset($_FILES['image'])){
		$image=FileUploadFactory::create('img',$_FILES['image']);
		$image->upload();
		$db->updatedata('product','image="'.$image->getaddress().'"');
	}
	$ret=$db->getdata('product',"*","pname='".$_REQUEST['pname']."'");
}catch(Exception $e){
	echo "Error:".$e;
}
?>

	<?php while ($row=$ret->fetch_assoc()) { ?>
	<div id="product" class="container well">
		<div class="col-sm-6" id="image">
			<img src="<?php echo $image->getaddress(); ?>">
		</div>
		<div class="col-sm-6" id="product-info">
			<h3><?= $row['pname'] ?></h3>
			<div class="row">
				<strong>Price:</strong>$<span id="product-price"><?= $row['price'] ?></span>
			</div>
			<div class="row">
				<?= $row['desp'] ?>
			</div>
		</div>
	</div>
			<?php  }  ?>

<?php include('templete/footer.php'); ?>
