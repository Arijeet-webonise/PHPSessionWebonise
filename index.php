<?php require_once("template/header.php"); ?>
	<div class="container">
		<form name="interface">
			<div>
				<label>Product</label>
				<input type="text" name="product" id="product" class="form-control">
				<ul id="suggestion"></ul>
			</div>
			<div>
				<label>Quantity</label>
				<input type="number" class="form-control" name="quant" id="quant">
			</div>
			<button id="addtocart">Add to Cart</button>
			<button id="submit">Checkout</button>
		</form>
	</div>
	<table class="table table-striped" id="cartview">
	</table>
	<script src="js/main.js"></script>
<?php require_once("template/footer.php"); ?>
