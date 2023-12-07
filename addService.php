<?php
session_start();
$bId=$_SESSION['bId'];
include("connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $serviceName=$_POST['serviceName'];
    $price=$_POST['price'];
    $discount=$_POST['discount'];
    $negotiable=$_POST['negotiable'];

$query= "INSERT INTO servicelist (bId,serviceName,price,discount,negotiate) VALUES ('$bId','$serviceName','$price','$discount','$negotiable')";
mysqli_query($con,$query);
header("Location: manageBusiness.php");
}
?>