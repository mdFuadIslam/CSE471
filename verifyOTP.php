<?php
session_start();

include("connection.php");

$otpSent=$_SESSION['sentOtp'];

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $otp=$_POST['otp'];
}
    if (!empty($otp))
    {
        if ($otp==$otpSent){
            $username=$_SESSION['userName'];
            $email=$_SESSION['email'];
            $password=$_SESSION['password'];
            $type=$_SESSION['type'];
            $query = "insert into userlist (name,password,mail,type) values ('$username','$password','$email','$type')";
			mysqli_query($con, $query);
            $responsMessage='OTP Verified!';
            if ($_SESSION['action']=='createAccount'){
                $responsMessage.="<br>Account Created!";
            }
            else if ($_SESSION['action']=='changePass'){

                header("Location: changePassword2.html");
                die;
            }
            $returnval="Login";
            $locations='login.php';
        }
        else{

            $responsMessage="Wrong OTP!";
            $returnval="Go Back";
            $locations='login.php';
        }
    }
    else{
        $returnval="Go Back";
        $locations='login.php';
        $responsMessage="WRONG OTP!";
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Verification</title>
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/signUpstyle.css">
    <style>
        .center {
        margin: 10px;
        padding: 250px;
        }
        .container{
            text-align: center;
            width: 25%;
            padding-right: 10px;
            padding-left: 10px;
            margin-right: auto;
            margin-left: auto;
        }
    </style>
</head>
<body>
    <div class='center'>
    <div class="container">
            <div class='form-textbox'><?php echo "$responsMessage";?></div>
            <?php echo"<form action='$locations'>
            <input type='submit' name='submit' id='submit' class='submit' value='$returnval'></form>";?>
    </div>
    </div>
</body>
</html>