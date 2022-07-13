<html>
<head>
<title> GoldWatch Price Tracker</title>
<meta http-equiv = "refresh" content = "3; url = https://www.goldwatch.link"/>
<link rel="stylesheet" href="mainstyle.css">
</head>
<body>


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
$last_checked = $time_created * 1000; #Spot timestamps are in milliseconds

$sql = "INSERT INTO Alerts_High (Email, Price_Target, Time_Created, Last_Checked)
VALUES ('$email', $pricetarget, $time_created, $last_checked)";

if(mysqli_query($conn, $sql)){
    echo "<h1/>Alert created!";
} else {
    echo "<h1/>Error: Could not execute $sql. " . mysqli_error($conn);  
}

mysqli_close($conn)
?>
</body>

</html>
