<?php 

session_start();
	include("connection.php");

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		if(!empty($username) && !empty($password))
		{
			$query = "select * from userlist where name = '$username'";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if(($user_data['password'] == $password))
					{
            $_SESSION['username']=$username;
						if($user_data['type'] == 'admin')
                        {
                            $_SESSION['username'] = $user_data['name'];
						    header("Location: admin.html");
						    die;
                        }
                        if($user_data['type'] == 'customer')
                        {
                            $_SESSION['username'] = $user_data['name'];
						    header("Location: customerInterface.html");
						    die; 
                        }
                        if($user_data['type'] == 'business')
                        {
                            $_SESSION['username'] = $user_data['name'];
						    header("Location: businessInterface.html");
						    die; 
                        }
                        
					}
				}
			}
			
			header("Location: reLogin.php");
		}else
		{
			header("Location: reLogin.php");
		}
	}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="css/style.css">

    <title>Login</title>
  </head>
  <body>
  

  <div class="d-lg-flex half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-7">
            <h3>Login</h3>
            <!--<p class="mb-4">motto</p>-->
            <form action="#" method="post">
              <div class="form-group first">
                <label for="username">Username</label>
                <input type="text" class="form-control" placeholder="Username" id="username" name="username">
              </div>
              <div class="form-group last mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" placeholder="Password" id="password" name="password">
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <!--<label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" checked="checked"/>
                  <div class="control__indicator"></div>
                </label>-->
                <span class="mr-auto"><a href="signup.php" class="sign-up">Sign Up</a></span>
                <span class="ml-auto"><a href="changePassword.html" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

            </form>
            
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    

    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>