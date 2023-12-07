<?php
session_start();
include("connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $sId=$_POST['sId'];
$username=$_SESSION['username'];

$query="select quantity from usercart where sId='$sId' and username='$username'";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_array($result);
$quantity=$data[0]-1;

if ($quantity>0){
    $query="update usercart set quantity='$quantity' where username='$username' and sId='$sId'";
}
else{
    $query="delete from usercart where username='$username' and sId='$sId'";
}
mysqli_query($con,$query);
header("Location: cart.php");
}
?>