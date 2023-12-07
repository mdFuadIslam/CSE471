<?php 

session_start();

	include("connection.php");

    if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$businessName = $_POST['businessName'];
		$catagory = $_POST['catagory'];
        $location=$_POST['location'];
    
        
        $username=$_SESSION['username'];

		if(!empty($businessName) && !empty($location) && !empty($catagory))
		{
			$query = "insert into pendingapplication (businessName,location,catagory,userName) values ('$businessName','$location','$catagory','$username')";
			mysqli_query($con, $query);
            //make it a respons message
            $response='application submitted!!';
			$location='businessInterface.html';
			$retVal="Dashboard";
            //sent to dashboard

		}
        else
		{
            $response='error!';
			$location='businessInterface.html';
			$retVal="Dashboard";
		}
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New Business</title>
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
            <div class='form-textbox'><?php echo "$response";?></div>
            <?php echo"<form action='$location'>
            <input type='submit' name='submit' id='submit' class='submit' value='$retVal'></form>";?>
    </div>
    </div>
</body>
</html>