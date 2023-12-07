<?php 

session_start();

	include("connection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
        $email = $_POST['email'];
		$username = $_POST['name'];
		$password = $_POST['pass'];
		$type = $_POST['type'];
        $terms=$_POST['agree-term'];

        


		if(!empty($terms) && !empty($email) && !empty($username) && !empty($password) && !is_numeric($username))
		{
            $query="select * from userlist where name='$username'or mail='$email'";
            $result=mysqli_query($con, $query);
            $namelist= mysqli_fetch_array($result,MYSQLI_ASSOC);
            if ($namelist['name']!=NULL && $namelist['mail']!=NULL){
                header("Location: reSignup.php");
                die;
            }
            $_SESSION['userName'] = $username;
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['type'] = $type;

            //sentOtp 
            $sentOtp='1111';
            $_SESSION['sentOtp']=$sentOtp;
            $_SESSION['action']='createAccount';
            header("Location: verifyOTP.html");
            die;
		}else
		{
			header("Location: signUpError.php");
            die;
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/signUpstyle.css">

</head>
<body>

    <div class="main">

        <h1>Sign up</h1>
        <div class="container">
            <div class="sign-up-content">
                <form method="POST" class="signup-form">
                    <h2 class="form-title">What type of user are you ?</h2>
                    <div class="form-radio">
                        <input type="radio" name="type" value="customer" id="customer" checked="checked" />
                        <label for="customer">Customer</label>

                        <input type="radio" name="type" value="business" id="business" />
                        <label for="business">Business-Man</label>
                    </div>

                    <div class="form-textbox">
                        <label for="name">user name</label>
                        <input type="text" name="name" id="name" />
                    </div>

                    <div class="form-textbox">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" />
                    </div>

                    <div class="form-textbox">
                        <label for="pass">Password</label>
                        <input type="password" name="pass" id="pass" />
                    </div>

                    <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="terms.php" class="term-service">Terms of service</a></label>
                    </div>

                    <div class="form-textbox">
                        <input type="submit" name="submit" id="submit" class="submit" value="Create account" />
                    </div>
                </form>

                <p class="loginhere">
                    Already have an account ?<a href="login.php" class="loginhere-link"> Log in</a>
                </p>
            </div>
        </div>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main1.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>

