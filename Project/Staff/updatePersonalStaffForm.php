
<!DOCTYPE html>
<html lang="en">
<head>
<title>FACILITY INFORMATION</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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

 <?php 
include "staff.php";
$staffId=$_POST['staffIdToUpdate'];
$qry = getStaffInformation($staffId);
$staffRecord = mysqli_fetch_assoc($qry);

$staffName = $staffRecord['staffName'];
$phoneNumber = $staffRecord['phoneNumber'];
$email = $staffRecord['email'];

echo '<div class="w3-container" style="margin-top:20px;" id="showcase">
        <h1><b>Update Staff Information</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>';

echo '<div id ="set" style="line-height: 1.8;">';
    echo '<form action="processStaff.php" method="POST">';
        echo '<fieldset class=" w3-border w3-round-xlarge w3-pale-red w3-border-red w3-margin w3-display-middle" style="width: 50%;top:55%"><legend>staff Information:</legend>';
    
        echo "Staff ID:<br><input type='text' name='staffId' value='$staffId' readonly class='w3-input w3-border w3-round-large'>"; 
        echo "<br>staff Name:<br><input type='text' name='staffName' value='$staffName' class='w3-input w3-border w3-round-large'>";  
        echo "<br>Phone Number:<br><input type=number' name='phoneNumber' value='$phoneNumber' class='w3-input w3-border w3-round-large'>";   
        echo "<br>Email:<br><input type='email' name='email' value='$email' class='w3-input w3-border w3-round-large'>";     

        echo "<br><br><input type='submit' name='updateStaffPersonalButton' value='Save' class='w3-button w3-red w3-round-xlarge 'style='margin:5px;'>";
        echo '<input type ="reset" name="resetButton" value="reset" class="w3-button w3-red w3-round-xlarge">';
        

        echo '</fieldset>';
    echo '</form>';
echo '</div>';
?>


</body>   
</html>

 