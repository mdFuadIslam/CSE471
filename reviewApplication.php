<?php
session_start();
include("connection.php");

$query="select username,businessName,bId from pendingapplication where status='pending'";
$result = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review application</title>
</head>
<body>
<?php
$n = mysqli_num_rows($result);
echo "number of pending applicaion: $n ";
if ($n>0){
?>
<table>
  <tr>
    <th>Username</th>
    <th>Business Name</th>
    <th>Preview</th>
  </tr>
  <?php
    while ($data=mysqli_fetch_array($result)){
        echo "<tr><th>'$data[0]'</th><th>'$data[1]'</th>
        <th><form method='post' action='select.php'>
        <input type='hidden' name='bId' id='bId' value='$data[2]'>
        <input type='submit' value='View'></form></th></tr>";
    }
?>
</table>
<?php
}
else{
    echo 'none';
}
?>
<a href='admin.html'>dashboard</a>
</body>
</html>