<?php
$con=mysqli_connect("localhost", "root", "","ajaxpost");
if(isset($_POST['User']) && $_POST['Pass']){
	$data = $_POST['User'];
	$pass = $_POST['Pass'];
	$sql = "SELECT email FROM registration WHERE email = '".$data."'";
	$run = mysqli_query($con, $sql);
	$chk = mysqli_num_rows($run);

	if($chk>0){
		$sql1 = "SELECT * FROM registration WHERE email ='".$data."' && password ='".$pass."'  ";
		$run1 = mysqli_query($con,$sql1);
		$chk1 = mysqli_num_rows($run1);
		if($chk1>0){
			$row = mysqli_fetch_row($run1);

// print_r($row);
			session_start();
			$_SESSION['id']= $row[0];
			$_SESSION['name']= $row[1];
			$_SESSION['email']= $row[2];
			$_SESSION['mobile']= $row[3];
			$_SESSION['address']= $row[4];
			echo '101';
		}
		else{
			echo '102';
		}
	}
	else{
		echo '103';
	}
}
else{
	echo '104';
}
?>


