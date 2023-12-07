<?php
session_start();
include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $bId=$_POST['bId'];
}
echo $bId;
$query= "SELECT * FROM pendingapplication where bId='$bId'";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$businessName=$data['businessName'];
$username=$data['username'];
$location=$data['location'];
$catagory=$data['catagory'];
if(array_key_exists('Accept', $_POST)) {
    Accept($bId,$businessName,$location,$catagory,$username,$con);
 }
 else if(array_key_exists('Reject', $_POST)) {
     Reject($bId,$con);
 }
 function Accept($bId,$businessName,$location,$catagory,$username,$con) {
     $query="UPDATE pendingapplication SET status='Accepted' WHERE bId='$bId'";
     $result=mysqli_query($con, $query);
     $query="INSERT INTO businesslist (businessName,location,catagory,userName) VALUE ('$businessName','$location','$catagory','$username')";
     mysqli_query($con, $query);
     header ("Location: reviewApplication.php");
         die;
 }
 function Reject($bId,$con) {
     $query="UPDATE pendingapplication SET status='rejected' WHERE bId='$bId'";
     mysqli_query($con, $query);
     header ("Location: reviewApplication.php");
     die;
 }
?>