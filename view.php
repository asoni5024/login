<?php
//create your database and table then connect 
$con =  mysqli_connect("localhost", "root", "", "ajaxpost");
 
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
else{
	$myvar = "select * from registration";
	
	$result = mysqli_query($con,$myvar);
	while ($row=mysqli_fetch_assoc($result)) {

		$data[]=array(
			"id"=>$row["id"],
			"name"=>$row["name"],
			"email"=>$row["email"],
			"mobile"=>$row["mobile"],
			"address"=>$row["address"],
			"password"=>$row["password"]
		);

	}
	$result = array('data'=>$data);
	echo json_encode($result);
}
?>