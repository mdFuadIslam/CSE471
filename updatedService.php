<?php
session_start();
$sId=$_SESSION['sId'];
include("connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $serviceName=$_POST['serviceName'];
    $price=$_POST['price'];
    $discount=$_POST['discount'];
    $negotiable=$_POST['negotiable'];
    

$query= "UPDATE servicelist SET serviceName='$serviceName',price='$price',discount='$discount',negotiate='$negotiable' WHERE sId='$sId'";
mysqli_query($con,$query);
$_SESSION['sId']='';
header("Location: manageBusiness.php");
}
?>