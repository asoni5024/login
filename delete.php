 <?php  //For delete table data
$con=mysqli_connect("localhost", "root", "","ajaxpost");
$data3 =$_POST['data3'];	
//print_r($data1);
	
	$sql =" DELETE FROM registration  WHERE id =".$data3['id'];
	
	$result = mysqli_query($con, $sql);
	if($result){
		echo 1;
	}
	else{
		echo 2;
	}
?>