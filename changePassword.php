<?php
session_start();

include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $userName = $_POST['userName'];
}
if (!empty($userName)){

$query="select mail from userlist where name='$userName'";
$result=mysqli_query($con, $query);
$mail= mysqli_fetch_assoc($result);
if (mysqli_num_rows($result)>0){
    //sent otp
    $sentOtp='1111';
    $_SESSION['username']=$userName;
    $_SESSION['sentOtp']= $sentOtp;
    $_SESSION['action']='changePass';
    header("Location: verifyOTP.html");
    die;
}
else{
    $responsMessage="Wrong Mail!";
    $returnval="Go Back";
    $locations='login.php';
}
}
else{
    $responsMessage="Wrong Input!";
    $returnval="Go Back";
    $locations='login.php';
}
?>