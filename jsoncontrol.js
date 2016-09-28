$(document).ready(function(){
	var json;
	$.post("jsonapi.php",{'requ':'view'},function(data) {
	 	json=(data);  
	 	console.log(JSON.parse(json));
 		var fram="<iframe src='jsonapi.php?json="+json+"&requ=view'></iframe>";
 		$(".view").html(fram); 
	});
	$("#addprod").click(
		function(e){
			e.preventDefault();
			var mode=$("input[name='returntype']:checked").val();
			console.log(mode);
			var name=$(".Pname").val();
			var price=$(".Price").val();
			$.ajax({
 				contentType:mode,
 				url: "jsonapi.php",
 				method:"get",
 				data:{'requ':'addProduct','name':name,'Price':price,'json':json}
 			}).done(function(data) {
		 		json=(data); 
		 		var fram;
		 		if(mode=="application/json"){
		 			fram="<iframe src='jsonapi.php?json="+json+"&requ=view'></iframe>";
		 		}
		 		else{
		 			fram="<iframe src='jsonapi.php?xml="+json+"&requ=view'></iframe>";
		 		}
		 		$(".view").html(fram);  
			});
 		}
	);
	$("#modprod").click(
		function(e){
			e.preventDefault();
			var mode=$("input[name='returntype']:checked").val();
			var name=$(".Pname2").val();
			var price=$(".Price2").val();
			var id=$(".PID").val();
			$.ajax({
 				contentType:mode,
 				url: "jsonapi.php",
 				method:"get",
 				data:{'requ':'modifyProduct','name':name,'Price':price,'ID':id,'json':json}
 			}).done(function(data) {
		 		json=(data); 
		 		var fram="<iframe src='jsonapi.php?json="+json+"&requ=view'></iframe>";
		 		$(".view").html(fram);  
			});
		}
	);
	$("#remprod").click(
		function(e){
			e.preventDefault();
			var mode=$("input[name='returntype']:checked").val();
			var id=$(".PID2").val();
			$.ajax({
 				contentType:mode,
 				url: "jsonapi.php",
 				method:"get",
 				data:{'requ':'removeProduct','ID':id,'json':json}
 			}).done(function(data) {
		 		json=(data); 
		 		var fram="<iframe src='jsonapi.php?json="+json+"&requ=view'></iframe>";
		 		$(".view").html(fram);  
			});
		}
	);

	//Cart Function

	$("#addcart").click(
		function(e){
			e.preventDefault();
			var mode=$("input[name='returntype']:checked").val();
			var quan=$(".quan1").val();
			var CID=$(".CID1").val();
			$.ajax({
 				contentType:mode,
 				url: "jsonapi.php",
 				method:"get",
 				data:{'requ':'addCart','Quantity':quan,'CID':CID,'json':json}
 			})
 			.done(function(data) {
		 		json=(data); 
		 		var fram="<iframe src='jsonapi.php?json="+json+"&requ=view'></iframe>";
		 		$(".view").html(fram);  
			});
		}
	);
	$("#modcart").click(
		function(e){
			e.preventDefault();
			var mode=$("input[name='returntype']:checked").val();
			var quan=$(".quan2").val();
			var id=$(".CID2").val();
			$.ajax({
 				contentType:mode,
 				url: "jsonapi.php",
 				method:"get",
 				data:{'requ':'modifyCart','Quantity':quan,'CID':id,'json':json}
 			}).done(function(data) {
		 		json=(data); 
		 		var fram="<iframe src='jsonapi.php?json="+json+"&requ=view'></iframe>";
		 		$(".view").html(fram);  
			});
		}
	);
	$("#remcart").click(
		function(e){
			e.preventDefault();
			var mode=$("input[name='returntype']:checked").val();
			var CID=$(".CID3").val();
			$.ajax({
 				contentType:mode,
 				url: "jsonapi.php",
 				method:"get",
 				data:{'requ':'removeCart','CID':CID,'json':json}
 			}).done(function(data) {
		 		json=(data); 
		 		var fram="<iframe src='jsonapi.php?json="+json+"&requ=view'></iframe>";
		 		$(".view").html(fram);  
			});
		}
	);
});