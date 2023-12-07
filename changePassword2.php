<?php
session_start();

include("connection.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $newPass=$_POST['newPass'];
}
$username=$_SESSION['username'];
$query="UPDATE userlist SET password= '$newPass' WHERE name='$username'";
mysqli_query($con, $query);
echo 'password changed!!';
echo"<a href='login.php'>login!!</a>";