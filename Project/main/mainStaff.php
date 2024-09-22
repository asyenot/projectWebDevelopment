<!DOCTYPE html>
<html lang="en">
<head>
<title>FACILITY INFORMATION</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
<style>
body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
body {font-size:16px;}
body {
  background-image: url('main3.jpg');
  background-repeat: no-repeat;
  background-size: 100%;
}
a{text-decoration: none;}
</style>
</head>
<body>

<!-- Sidebar/menu -->
<nav class="w3-bar w3-red" id="navbar"><br>
  <div class="w3-container">
    <h3 class="w3-padding-10 w3-center"><span>UniRent Hub</span></h3>
  </div>

</nav>

<div class="w3-display-middle w3-panel w3-border  w3-round-xxlarge w3-pale-red w3-border-red " style="padding: 70px;padding-right: 80px;"> 
<?php
//staffMenu.php
date_default_timezone_set('Asia/Kuala_Lumpur');
session_start();

if (!(isset($_SESSION['userId']) && $_SESSION['userId'] != '')) {
	header ("Location: ../login/loginStaff.php");
}
 
  $userName = $_SESSION['userId'];
  $curTime = $_SESSION['curTime'];
  echo '<h1>Welcome to UniRent Hub</h1>';
  echo "<h4>User : ".$userName."</h4>";
  $strTime = date("H:i A",$curTime) ;
  echo "<h4>Masa Masuk : ".$strTime."</h4>";
  ?>


<fieldset><legend><h3>Menu:</h3></legend>
<ol>
  <li><a class=" w3-text-red "><b><a href="../Customer/customerList.php">Customer List</a></b></a></li>
  <li><a class=" w3-text-red "><b><a href="../facilityInformation/facilityList.php">Facility List</a></b></a></li>
</ol>

  
</fieldset>

<p class=" w3-text-red "><b><a href="../logout.php">LogOut</a></b></p>
</div>

</body>   
</html>
