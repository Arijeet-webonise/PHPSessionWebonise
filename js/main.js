$(document).ready(function(){
	var num=0;
	$(".addform").click(function(e){
		if($("#"+e.toElement.id).siblings("input").size()<4){
			num++;
			$("#"+e.toElement.id).siblings(".num").val(num);
			var sample=($("#"+$("#"+e.toElement.id).siblings("div").attr('id')).children());
			var image=sample["0"].id;
			var name=sample["0"].name;
			$("#"+e.toElement.id).siblings("div").after('<input type="file" class="form-control" name="'+name+num+'" id="'+image+num+'">');
		}
	});
});