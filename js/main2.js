function cartview(){
	$('#cartview').empty();
	node=document.createElement('tr');
	noden=document.createElement('th');
	noden2=document.createElement('th');
	noden3=document.createElement('th');
	noden.innerHTML="Product Name";
	node.appendChild(noden);
	noden2.innerHTML="Quantity";
	node.appendChild(noden2);
	node.appendChild(noden3);
	$('#cartview').append(node);
	for (var i = 0; i < cart.length; i++) {
		noden=document.createElement('td');
		noden.innerHTML=jsonfile.products[cart[i].product_id-1].name;
		nodeq=document.createElement('td');
		nodei=document.createElement('input');
		nodei.value=cart[i].Quantity;
		nodei.type="number";
		nodeq.appendChild(nodei);
		nodec=document.createElement('td');
		nodeb=document.createElement('button');
		nodeb.innerHTML="update";
		nodeb.className="updatebtn";
		nodec.appendChild(nodeb);
		node=document.createElement('tr');
		node.id="cart_"+i;
		node.appendChild(noden);
		node.appendChild(nodeq);
		node.appendChild(nodec);
		$('#cartview').append(node);
	}
	$(".closebtn").click(function(e){
		cart.splice(parseInt(e.target.parentNode.parentNode.id.substring(5)),1);
		window.localStorage.setItem("cart",JSON.stringify(cart));
		cartview();
	});

	$(".updatebtn").click(function(e){
		cart[parseInt(e.target.parentNode.parentNode.id.substring(5))].Quantity=e.target.parentNode.parentNode.children[1].children[0].value;
		window.localStorage.setItem("cart",JSON.stringify(cart));
		$.ajax({
			url: "curl.php",
			data:{pid:parseInt(e.target.parentNode.parentNode.id.substring(5))+1,'quantity':parseInt(e.target.parentNode.parentNode.children[1].children[0].value),'method':'update'},
			datatype:'json'
		}).done(function(data) {
			jsonfile=data;
		});
	});
}

function checkout(){
	$.ajax({
		url: "curl.php",
		data:{"cart":JSON.stringify(cart),'method':'checkout'},
		datatype:'json'
	}).done(function(data) {
		jsonfile=data;
	});
}

$(document).ready(function(){
	// alert("hi");
	$.ajax({
		url: "product.json",
		datatype:'json'
	}).done(function(data) {
		jsonfile=data;
		cartview();
	});
	$("#product").change(function()
		{
			if(str.length==0){
				$("#suggestion").css({'border-weight':"0px"});
				$("#suggestion").empty();
			}
		});
	$("#product").keyup(function () {
		str=$("#product").val();
		$("#suggestion").empty();
		for (var i = 0; i < jsonfile.products.length; i++) {
			if(jsonfile.products[i].name.includes(str)){
				node=document.createElement('li');
				node.className="suggestionop";
				node.innerHTML=(jsonfile.products[i].name);		
				$("#suggestion").append(node);
			}
		}
		$("#suggestion").css({'border-weight':"1px",
				"border-style":"solid",
				"border-color":"#A5ACB2",
				"background":"#A5ACB2","color":"#ffffff"});
	});
	cart=[];
	if(window.localStorage.getItem("cart")!=null){
		cart=JSON.parse(window.localStorage.getItem("cart"));
	}
	$("#addtocart").click(function(e){
		e.preventDefault();
		for (var i = 0; i < jsonfile.products.length; i++) {
			if(jsonfile.products[i].name.includes($("#product").val())){
				var tempcart={"product_id":jsonfile.products[i].id,"Quantity":$("#quant").val()}
				cart.push(tempcart);

				cartview();
			}
		}
		window.localStorage.setItem('cart',JSON.stringify(cart));

	});

	$("#submit").click(function(e){
		e.preventDefault();
		checkout();
	});
});
