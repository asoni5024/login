
function savedata()
{
	var name = $("#n").val();
	//alert(name);
	var email = $("#e").val();
	//alert(email);
	var mobile = $("#m").val();
	//alert(mobile);
	var address = $("#ad").val();
	//alert(address);
	var password = $("#p").val();
	//alert(password);
	$.ajax({
			type: "POST",
			url: "insert.php",
			data: {name:name,email:email,mobile:mobile,address:address,password:password},
			cache: false,		 
			success: function(data){
				alert(data);
			},
		});
}