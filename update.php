<?php 
$con=mysqli_connect("localhost", "root", "","ajaxpost");
$data2 =$_POST['data2'];
 
	 $sql =" UPDATE registration SET name='".$data2['name']."',email='".$data2['email']."',mobile='".$data2['mobile']."',address='".$data2['address']."',password='".$data2['password']."' WHERE id =".$data2['id'];
	
	$result = mysqli_query($con, $sql);
	if($result){
		echo 101;
	}
	else{
		echo 102;
	}
?>