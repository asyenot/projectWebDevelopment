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
a{text-decoration: none;}
</style>
</head>
<body>

<!-- Sidebar/menu -->
<nav class="w3-bar w3-red" id="navbar"><br>
  <div class="w3-container">
    <h3 class="w3-padding-10"><span>UniRent Hub</span></h3>
  </div>

</nav>

<div class="w3-display-middle w3-panel w3-border  w3-round-xxlarge w3-pale-red w3-border-red " style="padding: 70px;padding-right: 80px;"> 
<h2 >Register</h2>
<form action="processCustomer.php" method="POST">
    User Id
    <br><input type="text" name="userId" placeholder="Enter userId" class="w3-input w3-border w3-round-large" required ><br>
    Password
    <br><input type="password" name="password" placeholder="Enter password" class="w3-input w3-border w3-round-large" required><br>
    Email
    <br><input type="email" name="email" placeholder="Enter Email" class="w3-input w3-border w3-round-large" required><br>
    Enter User Type <br>
    <select name="userType" class="w3-input w3-border w3-round-large"   >
        <option value="CUSTOMER">CUSTOMER</option>
        <option value="STAFF">STAFF</option>
    </select>
    <br>
    <input type="submit" name="registerUserButton" value="SignUp"  class="w3-button w3-red w3-round-large"><br>

</form>
<p class=" w3-text-red " style="padding-left: 10px;"><b><a href="../main/mainPage.php">have an account? Login</a></b></p>
</div>

</body>   
</html>
