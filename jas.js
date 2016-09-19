$(document).ready(function(){
	$("#file").val("local.txt");
	$("#gettxt").click(function(e){
		$.ajax({
			url: "getfile.php",
			context: document.body,
			data:{'file':$("#file").val()}
		}).done(function(data) {
			$( "#txtarea" ).html(data);
		});
	});
	$("#settxt").click(function(e){
		$.ajax({
			url: "setfile.php",
			data:{'txt':$( "#txtarea" ).val(),'file':$("#file").val()},
			dataType:'json',
			context: document.body
		}).done(function(data) {
			alert("hi");
		});
	});
});