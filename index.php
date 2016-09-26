<?php include('templete/header.php'); ?>

<div class="container">
<?php 
try{
	$db=new MySqlDB();
	$db->connect('phpsession','','root');
	$ret=$db->getdata('product',"*");
	while ($row=$ret->fetch_assoc()) { 
?>
	<div class="well col-sm-4 preview">
		<div class="imagepre">
			<img src="<?= $row['image'] ?>">
		</div>
		<h4 class="pname"><?= $row['pname'] ?></h4>
		<a href="product.php?pid=<?= $row['pid'] ?>" class="btn btn-info">Show</a>
	</div>
</div>
<?php 
	}
}catch(Exception $e){
	echo "Error".$e->getMessage();
}
?>
<?php include('templete/footer.php'); ?>
