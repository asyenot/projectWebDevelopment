<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<style>
body,h4 {font-family: "Raleway", sans-serif}
body, html {height: 100%}
.bgimg {
  background-image: url('login.jpg');
  min-height: 100%;
  background-position: center;
  background-size: cover;
}
h4{
	color: black;
}
a{
	color: red;
}
</style>
<?php
session_start(); 
include "user.php";
$_SESSION['userId']=$_POST['userId'];  
$_SESSION['password']=$_POST['password'];  
$_SESSION['curTime']=time();


// username and password sent from form 
$username=$_POST['userId']; 
$password=$_POST['password']; 


$isValidUser = validatePassword($username,$password);

if($isValidUser)
	{
	$userType=getUserType($username);
		if($userType =='STAFF')
			header("location: ../main/mainStaff.php"); // redirect to admin page
		else{
			echo '<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">';
			echo '<div class="w3-display-middle">';
		  		echo '<h4 class="w3-jumbo w3-animate-top w3-center">WRONG USERNAME OR PASSWORD</h4>';
		  		echo '<hr class="w3-border-grey" style="margin:auto;width:40%">';
		  		echo '<p class="w3-large w3-center"><a href="loginCustomer.php">Try Again?</a></p>';
			echo '</div>';
	  	echo '</div>';
		}
	}
else {
	echo '<div class="bgimg w3-display-container w3-animate-opacity w3-text-white">';
			echo '<div class="w3-display-middle">';
		  		echo '<h4 class="w3-jumbo w3-animate-top w3-center">WRONG USERNAME OR PASSWORD</h4>';
		  		echo '<hr class="w3-border-grey" style="margin:auto;width:40%">';
		  		echo '<p class="w3-large w3-center"><a href="loginStaff.php">Try Again?</a></p>';
			echo '</div>';
	  	echo '</div>';
	}
?>
	
</html>