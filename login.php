<DoctypeHtml>
<html>
	<head>
		<title>Registration form</title>
		<meta charset="utf-8">
		 <meta name="viewport" content="width=device-width,nitial-scale=1">
		 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   <style type="text/css">
   	.valid{
      color: red;
     }
   </style>
	</head>
	<body>
	
		<center><div>
			<div class="container">
				<h1>Login</h1>
					</br>
					<label>Email</label>
					<input type="email" name="email" id="User" placeholder="eg:john@example.com"><div class="valid" id="val_User"></div></td>
				</br></br>
					<label>Password</label>
					<input type="text" name="pass" id="Pass" placeholder="**********"><div class="valid" id="val_Pass"></div>
				</br></br>
					<input type="submit" id="btn" value="Login" onclick="login_function()">  
				</br></br>
				<a href="registration.html">Signup</a>
			</form></div>
		</center>

		<script>
			function login_function(){
	var email = $("#User").val();
	var Pass = $("#Pass").val();

	if (User){
		$.ajax({
			type : 'POST',
			url : 'log.php',
			data : { 'User' : email,
					 'Pass' : Pass },
			cache : false,
			success : function(result){
				if(result==101){
					window.location.href = 'profile.php';
				}
				else if(result==102){
					$('#val_Pass').html("Password is incorrect");
				}
				else if(result==103){
					$('#val_User').html("please register first");

				}
				else if(result==104){
					alert('Please enter Email and Password Correctly!');
				}
				else{
					alert('somthing is wrong!');
				}
			}

		})
	}

}
		</script>
	</body>
</html>