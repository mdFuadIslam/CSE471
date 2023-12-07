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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review pending application</title>
</head>
<body>
    <?php
    echo "Business name: $businessName";
    echo "Owner name: $username";
    echo "Locaion: $location";
    echo "Catagory: $catagory";
    echo "Proof";
    ?>
    <br>choose action:<br>
    <form method="post" action='decision.php'>
        <?php
        echo "<input type='hidden' name='bId' id='bId' value='$bId'>"?>
        <input type="submit" class="button" name="Accept" value="Accept" >
         
        <input type="submit" class="button" name="Reject" value="Reject" >
    </form>
    <a href='admin.html'>dashboard</a>
</body>
</html>