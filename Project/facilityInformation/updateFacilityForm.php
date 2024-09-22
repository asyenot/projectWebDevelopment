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
 <?php 
include("facility.php");
$facilityId = $_POST['facilityIdToUpdate'];
$qry = getFacilityInformation($facilityId);
$facilityRecord = mysqli_fetch_assoc($qry);

$facilityName = $facilityRecord['facilityName'];
$type = $facilityRecord['type'];
$capacity = $facilityRecord['capacity'];
$ratePerDay = $facilityRecord['ratePerDay'];
$status = $facilityRecord['status'];

echo '<div class="w3-container" style="margin-top:20px;" id="showcase">
        <h1><b>Update Facility Information</b></h1>
        <hr style="width:50px;border:5px solid red" class="w3-round">
    </div>';

echo '<div id ="set" style="line-height: 1.5;">';
    echo '<form action="processFacility.php" method="POST">';
        echo '<fieldset class=" w3-border w3-round-xlarge w3-pale-red w3-border-red w3-margin w3-display-middle" style="width: 50%;top:55%"><legend>Facility Information:</legend>';
        echo "Facility Id: <input type='text' name='facilityId' value='$facilityId' readonly class='w3-input w3-border w3-round-large'>";
        echo "<br>Facility Name: <input type='text' name='facilityName' value='$facilityName' class='w3-input w3-border w3-round-large'>"; 
        echo "<br>Type: <input type='text' name='type' value='$type' class='w3-input w3-border w3-round-large'>";
        echo "<br>Capacity: <input type='text' name='capacity' value='$capacity' class='w3-input w3-border w3-round-large'>";
        echo "<br>Rate Per Day: <input type='text' name='ratePerDay' value='$ratePerDay' class='w3-input w3-border w3-round-large'>";
        echo "<br>Status: <input type='text' name='status' value='$status' class='w3-input w3-border w3-round-large'>";    

        echo "<br><br><input type='submit' name='updateFacilityButton' value='Save' class='w3-button w3-red w3-round-xlarge 'style='margin:5px;'>";
        echo '<input type ="reset" name="resetButton" value="reset" class="w3-button w3-red w3-round-xlarge">';
        

        echo '</fieldset>';
    echo '</form>';
echo '</div>';
?>


</body>   
</html>

 