<?php
session_start();
include('connection.php');
$username=$_SESSION['username'];
$total=$_SESSION['total'];
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $number=$_POST['number'];
    $trx=$_POST['trx'];
}
$query="INSERT INTO invoice (username,number,trx) values ('$username','$number','$trx')";
mysqli_query($con,$query);
$query="select invoiceID from invoice where trx='$trx'";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_array($result);
$invoiceId=$data[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="styles/headerreset.min.css" />
    <link rel="stylesheet" href="styles/headerstyle.css" />
    <link rel="stylesheet" href="styles/header-14.css" />
    <link rel="stylesheet" href="styles/footer.css" />
    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/signUpstyle.css">
    <style>
      .center {
      margin: 10px;
      padding: 50px;
      }
      .container{
          text-align: center;
          width:80%;
          padding-right: 10px;
          padding-left: 10px;
          margin-right: auto;
          margin-left: auto;
      }
      table, th, td {
        border: 1px solid black;
        } 
  </style>
</head>
<body>
    <div class='center'>
        <div class='container'>
    Dear <?php echo"$username,<br>";?>
    Invoice no: <?php echo"$invoiceId,<br>";?><br>
    Billing Information:<br>
    Number: <?php echo"$number,<br>";?>
    Transaction Number:<?php echo"$trx,<br>";?>
    Cart:<br>
    <table>
        <tr>
            <th>Service Code</th>
            <th>Service name</th>
            <th>Price</th>
            <th>Discount</th>
            <th>Quantity</th>
            <th>Total Price</th>
        </tr>
        <?php
        $total=0;
        $query="select * from usercart where username='$username'";
        $result = mysqli_query($con, $query);
        while ($data=mysqli_fetch_array($result)){
            echo"<tr>";
            echo "<th>'$data[1]'</th>
                <th>'$data[2]'</th>
                <th>'$data[3]'</th>
                <th>'$data[4]'</th>
                <th>'$data[5]'</th>";
            $price=($data[3]-($data[3]*($data[4]/100)))*$data[5];
            $total+=$price;
            echo "<th>'$price'</th>";
        }
        ?>
    </table>
    Total: <?php echo "$total<br>";?>
    </div>
    </div>
    <div class='center'>
    <div class="container">
            <div class='form-textbox'>Go to Dashboard</div>
            <form action='customerInterface.html'>
            <input type='submit' name='submit' id='submit' class='submit' value='Dashboard'></form>
    </div>
    </div>
</body>
</html>




<?php
$query="delete from usercart where username='$username'";
mysqli_query($con,$query);
?>