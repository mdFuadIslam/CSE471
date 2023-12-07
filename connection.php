<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "chologureberai";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}
