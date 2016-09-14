$(document).ready(function(){
	$("#submit").click(function(e){
		e.preventDefault();
		var target_url=$("#url").val();
		$.ajax({
		  url: "crawler.php",
		  data: {'url':target_url}
		}).done(function(data) {
		  $(".output").html(data);
		});
	})
});