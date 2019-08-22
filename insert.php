<?php
//create your database and table then connect 
$mysqli = new mysqli("localhost", "root", "", "ajaxpost");
 
// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}
 
$name = $mysqli->real_escape_string($_POST['name']);
$email = $mysqli->real_escape_string($_POST['email']);
$mobile = $mysqli->real_escape_string($_POST['mobile']);
$address = $mysqli->real_escape_string($_POST['address']);
$password = $mysqli->real_escape_string($_POST['password']);

 
$sql = "insert into registration(name,email,mobile,address,password) values('$name','$email','$mobile','$address','$password')";
if($mysqli->query($sql) === true){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}
 
// Close connection
$mysqli->close();
 
 
?>