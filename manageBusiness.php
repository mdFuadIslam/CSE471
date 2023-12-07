<?php
session_start();
include("connection.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
    $bId=$_POST['bId'];
    $_SESSION['bId']=$bId;
}
$bId=$_SESSION['bId'];
$query= "SELECT * FROM businesslist where bId='$bId'";
$result=mysqli_query($con,$query);
$data=mysqli_fetch_assoc($result);
$businessName=$data['businessName'];
$location=$data['location'];
$catagory=$data['catagory'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Business</title>
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
          width: 75%;
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
    <!-- Header Start -->
    <header class="site-header">
        <div class="site-header__top">
          <div class="wrapper site-header__wrapper">
            <div class="site-header__middle">
              <a href="businessInterface.html" class="brand">Gure Berai</a>
            </div>
          </div>
        </div>
        <div class="site-header__bottom">
          <div class="wrapper site-header__wrapper">
            <div class="site-header__start">
              <nav class="nav">
                <button class="nav__toggle" aria-expanded="false" type="button">
                  menu
                </button>
                <ul class="nav__wrapper">
                  <li class="nav__item"><a href="businessInterface.html">Home</a></li>
                  <li class="nav__item"><a href="createNewBus.html">Create new business</a></li>
                  <li class="nav__item"><a href="applicationStatus.php">Business profile Applications</a></li>
                  <li class="nav__item"><a href="viewBusinessProfile.php">View Active Business Profile</a></li>
                  <li class="nav__item"><a href="logout.php">Log Out</a></li>
                </ul>
              </nav>
            </div>
  
            <div class="site-header__end bottom">
              <a href="#" class="cart">
                <svg
                  version="1.1"
                  viewBox="0 0 100 100"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <g>
                    <title>Cart</title>
                    <path
                      d="m95.398 23.699c-1.8008-2.3008-4.6016-3.6992-7.5-3.6992h-60.898l-1.8984-7.3984c-1.1016-4.3008-4.8984-7.3008-9.3008-7.3008h-10.199c-1.6992 0-3.1016 1.3984-3.1016 3.1016 0 1.6992 1.3984 3.1016 3.1016 3.1016h10.199c1.5 0 2.8008 1 3.1992 2.5l12.199 48.602c1.1016 4.3008 4.8984 7.3008 9.3008 7.3008h39.898c4.3984 0 8.3008-3 9.3008-7.3008l7.5-30.801c0.69922-2.8047 0.10156-5.8047-1.8008-8.1055zm-4.2969 6.6992-7.5 30.801c-0.39844 1.5-1.6992 2.5-3.1992 2.5h-39.902c-1.5 0-2.8008-1-3.1992-2.5l-8.6992-34.898h59.301c1 0 2 0.5 2.6016 1.3008 0.59766 0.79688 0.89453 1.7969 0.59766 2.7969z"
                    />
                    <path
                      d="m42.602 73.898c-5.6992 0-10.398 4.6992-10.398 10.398s4.6992 10.398 10.398 10.398c5.6992 0.003907 10.398-4.6953 10.398-10.395s-4.6992-10.402-10.398-10.402zm0 14.5c-2.3008 0-4.1016-1.8008-4.1016-4.1016s1.8008-4.1016 4.1016-4.1016c2.3008 0 4.1016 1.8008 4.1016 4.1016-0.003906 2.2031-1.9023 4.1016-4.1016 4.1016z"
                    />
                    <path
                      d="m77 73.898c-5.6992 0-10.398 4.6992-10.398 10.398s4.6992 10.398 10.398 10.398 10.398-4.6992 10.398-10.398c-0.097657-5.6953-4.6992-10.398-10.398-10.398zm0 14.5c-2.3008 0-4.1016-1.8008-4.1016-4.1016s1.8008-4.1016 4.1016-4.1016 4.1016 1.8008 4.1016 4.1016c0 2.2031-1.9023 4.1016-4.1016 4.1016z"
                    />
                  </g>
                </svg>
              </a>
              <a href="#">
                <svg
                  version="1.1"
                  viewBox="0 0 100 100"
                  xmlns="http://www.w3.org/2000/svg"
                >
                  <title>Profile</title>
                  <path
                    d="m65.57 52.5c6.9336-4.5078 11.574-11.797 12.723-19.988 1.1484-8.1875-1.3047-16.473-6.7344-22.715-5.4258-6.2422-13.289-9.8242-21.559-9.8242s-16.133 3.582-21.559 9.8242c-5.4297 6.2422-7.8828 14.527-6.7344 22.715 1.1484 8.1914 5.7891 15.48 12.723 19.988-10.012 3.2812-18.73 9.6406-24.914 18.172-6.1836 8.5273-9.5117 18.793-9.5156 29.328h7.1445c0-15.312 8.168-29.461 21.426-37.117 13.262-7.6523 29.598-7.6523 42.859 0 13.258 7.6562 21.426 21.805 21.426 37.117h7.1445c-0.003906-10.535-3.332-20.801-9.5156-29.328-6.1836-8.5312-14.902-14.891-24.914-18.172zm-37-23.93c0-5.6836 2.2578-11.133 6.2773-15.152 4.0195-4.0156 9.4688-6.2734 15.152-6.2734s11.133 2.2578 15.152 6.2734c4.0195 4.0195 6.2773 9.4688 6.2773 15.152 0 5.6836-2.2578 11.137-6.2773 15.152-4.0195 4.0195-9.4688 6.2773-15.152 6.2773s-11.133-2.2578-15.152-6.2773c-4.0195-4.0156-6.2773-9.4688-6.2773-15.152z"
                  />
                </svg>
              </a>
            </div>
          </div>
        </div>
      </header>
      <!-- Header End -->
      <div class='center'>
        <div class='container'>
    <?php
    echo "Business name: $businessName<br>";
    echo "Locaion: $location<br>";
    echo "Catagory: $catagory<br>";
    ?>
    <br>
    offered service:
    <table style="width:100%">
    <tr>
        <th>Service Name</th>
        <th>Price</th>
        <th>Discount</th>
        <th>Negotiable</th>
    </tr>
    <?php
        $query="select * from servicelist where bId='$bId'";
        $result=mysqli_query($con,$query);
        while ($data=mysqli_fetch_array($result)){
            echo "<tr><th>'$data[2]'</th>
            <th>'$data[3]'</th>
            <th>'$data[4]'</th>
            <th>'$data[5]'</th>
            <th><form method='post' action='removeService.php'>
            <input type='hidden' name='sId' id='sId' value='$data[0]'>
            <input type='submit' value='remove'></form></th>
            <th><form method='post' action='updateService.php'>
            <input type='hidden' name='sId' id='sId' value='$data[0]'>
            <input type='submit' value='update'></form></th></tr>";
        }
    ?>
    </table>
    </div>
    </div>
    <div class='center'>
    <div class="container">
            <form action='addService.html'>
            <input type='submit' name='submit' id='submit' class='submit' value='Add Service'></form>
    </div>
    </div>
</body>
</html>