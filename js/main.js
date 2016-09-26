var addform=document.getElementsByClassName("addform");


function validate(){
	if(document.userform.name.value==''||document.userform.email.value=='')
		alert("Enter Name And Email");
		return false;
	var atpos = document.userform.email.value.indexOf("@");
    var dotpos = document.userform.email.value.lastIndexOf(".");
    if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }
	return false;
}
for (var i = 0; i < addform.length; i++) {
	addform[i].addEventListener("click", function(e){
		var num=this.parentNode.children[2].value;
		if(num==4){
			return;
		}
		this.parentNode.children[2].value++;
		var id=this.parentNode.children[3].childNodes[1].id;
		node=document.createElement('input');
		node.type="file";
		node.className="form-control"; 
		node.name="image"+num; 
		node.id="image"+num;
		this.parentNode.appendChild(node);
	});
}

document.getElementById('cancel').addEventListener("click",function(){
	var confirmation = confirm("Are You Sure!");
	if(confirmation){
		var input=document.getElementsByTagName('input');
		for (var i = 0; i < input.length; i++) {
			input[i].value="";
		}
	}
	return false;
});
