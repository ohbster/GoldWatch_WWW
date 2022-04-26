<?php 
require_once 'dbconfig.php';

$conn = mysqli_connect("$hostname","$username","$password", "$dbname");
if ($conn === false){
    die("Error: Could not connect to database. " . mysqli_connect_error());
}

$date = new DateTime();
$time_created = $date->getTimestamp();
$email = mysqli_real_escape_string($conn, $_REQUEST['email']);
$pricetarget = mysqli_real_escape_string($conn, $_REQUEST['pricetarget']);

$sql = "INSERT INTO Alerts_High (Email, Price_Target, Time_Created, Last_Checked)
VALUES ('$email', $pricetarget, $time_created, $time_created)";

if(mysqli_query($conn, $sql)){
    echo "Alert created!";
} else {
    echo "Error: Could not execute $sql. " . mysqli_error($conn);  
}

mysqli_close($conn)
?>