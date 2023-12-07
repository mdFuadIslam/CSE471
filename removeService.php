<?php
session_start();
include("connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sId=$_POST['sId'];
    $_SESSION['sId']=$sId;
}
$sId=$_SESSION['sId'];

$query="DELETE FROM servicelist WHERE sId='$sId'";
mysqli_query($con,$query);
header("Location: manageBusiness.php");
?>