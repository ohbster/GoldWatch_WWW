<style>
p   {
    font-familiy: Verdana;
    text-align: center;}
h1  {
    color: #fefefe;
    font-size: 32px;}
h2  {
    color: #fdda5c;
    font-size: 32px;}
h4  {
    color: #fefefe;}
body {
    background-color: #212121;}
a:link { 
    color: #fdda5c;
    text-decoration: none;}
a:visited { 
    color: #fdda5c;
    text-decoration: none;}
a:hover { 
    color: #fdda5c;
    text-decoration: none;}
a:active { 
    color: #fdda5c;
    text-decoration: none;}
label {
    color: #fefefe;
    }
</style>
<html>
<head>
<title> GoldWatch Price Tracker</title>
<meta http-equiv = "refresh" content = "3; url = https://www.goldwatch.link"/>
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

$sql = "INSERT INTO Alerts_High (Email, Price_Target, Time_Created, Last_Checked)
VALUES ('$email', $pricetarget, $time_created, $time_created)";

if(mysqli_query($conn, $sql)){
    echo "<h1/>Alert created!";
} else {
    echo "<h1/>Error: Could not execute $sql. " . mysqli_error($conn);  
}

mysqli_close($conn)
?>
</body>

</html>
