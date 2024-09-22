<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style>
        body,
        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Poppins", sans-serif
        }

        body {
            font-size: 16px;
        }
        a{text-decoration: none;}
    </style>
</head>
<body>

    <nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
        <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close</a>

        <div class="w3-container">
            <h3 class="w3-padding-64"><b>UniRent Hub<br>(Customer)</br></h3>
        </div>

        <div class="w3-bar-block">
            <a href="../main/mainCustomer.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
            <a href="bookFacilityForm.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Book List</a>
            <a href="bookingListForm.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">View Booking</a>
            <a href="../Customer/profileCustomer.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Profile</a><br>
            <a href="../logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">LogOut</a>
        </div>
    </nav>

    <div class="w3-main" style="margin-left:340px;margin-right:40px">

        <div class="w3-container" style="margin-top:80px;" id="showcase">
            <h1 class="w3-jumbo"><b>Book List</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>

        <div class="w3-container">
            <?php
            session_start();
            include "../Customer/customer.php";
            include "../facilityInformation/facility.php";

            if (!(isset($_SESSION['userId']) && $_SESSION['userId'] != '')) {
                header("Location: ../main/mainPage.php");
            }

            $custId = $_SESSION['userId'];

            
            if (isset($_POST['searchByDate'])) {
                $startDate = $_POST['startDate'];
                $endDate = $_POST['endDate'];
                $qryAvailable = getAvailableFacilityOnTheseDate($startDate, $endDate);
                if (mysqli_num_rows($qryAvailable) > 0)
                    showAvailableFacilityOnThisDate($qryAvailable);
                else
                    echo 'No facility available between ' . $startDate . ' and ' . $endDate;
            } else {
                
                displayBookingDateOption();
    
            }
    
            ?>

        </div>


        <header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
            <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
            <span>UniRent Hub</span>
        </header>

        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>



    </div>
    <script>
        function w3_open() {
            document.getElementById("mySidebar").style.display = "block";
            document.getElementById("myOverlay").style.display = "block";
        }

        function w3_close() {
            document.getElementById("mySidebar").style.display = "none";
            document.getElementById("myOverlay").style.display = "none";
        }
        function validateForm() {
        var start = document.forms["bookingForm"]["startDate"].value;
        var end = document.forms["bookingForm"]["endDate"].value;

        if (start >= end) {
            alert("Start date is after/same as the end date. Select correct date");
            return false;
        }
        }
    </script>
    <?php
function displayBookingDateOption()
{
echo '<div class="w3-container ">';
		echo '<fieldset class=" w3-border w3-round-xlarge w3-pale-red w3-border-red"><legend>Select date to book:</legend>';
		echo '<form action="" method="POST" onsubmit="return validateForm()" name="bookingForm">';
		echo 'Start Date :<input type=date name=startDate class="w3-input w3-border w3-round-large"><br>';
        echo 'End Date :<input type=date name=endDate class="w3-input w3-border w3-round-large">';
		echo '<input type="submit" value="search" name = searchByDate  class="w3-button w3-red w3-round-xxlarge" style="margin:5px;">';
		echo '<input type="reset" value="clear" name="clear"  class="w3-button w3-red w3-round-xxlarge">';
		echo '</form>';
		echo '</fieldset>';
echo '</div>';

}
function showAvailableFacilityOnThisDate($qryAvailable)
{
$customerId = $_SESSION['userId'];//customerId
$startDate = $_POST['startDate'];
$endDate = $_POST['endDate'];
//display car info	

echo '<div class="w3-round-xlarge w3-red w3-large" style="text-align:center; padding: 10px;" >List of car available from '.$startDate. ' to '. $endDate .' <a href="bookFacilityForm.php" class="w3-right w3-text-white w3-large">back<a></div>';
echo '<table class="w3-margin w3-table-all w3-card-4" style="width: 98%;">';
echo '<tr class="w3-red" style=" border-radius: 10px;">
		<td>No</td>
		<td>FacilityId</td>
		<td>Facility Name</td>
		<td>Type</td>
		<td>Rate Per Day</td>
		<td>Capacity</td>
		<td>Price</td>
		<td>Book Facility</td>
	</tr>';
$i=1;
while($row=mysqli_fetch_assoc($qryAvailable))//Display car information
  {

  $ratePerDay = $row['ratePerDay'];
 $facilityId=$row['facilityId'];
  echo '<tr class="w3-hover-pale-red">';
  echo '<td>'.$i.'</td>';
  echo '<td>'.$row['facilityId'].'</td>';
  echo '<td>'.$row['facilityName'].'</td>';
  echo '<td>'.$row['type'].'</td>';
  echo '<td>'.$row['ratePerDay'].'</td>';
  echo '<td>'.$row['capacity'].'</td>';
  //taxes
   $Rental_period=getDayDiff($startDate,$endDate);
   $total = $Rental_period *  $row['ratePerDay'];
   $tax=0.06 * $total;
   $Amount_due = $tax + $total;
   echo '<td>Total RM:'.number_format($total,2).'<br>Tax RM:'.number_format($tax,2).'<br>Amount Due RM:'.number_format($Amount_due,2);
   echo '</td>';
   echo '<td>';
   echo '<form action="processBooking.php" method="post" >';
			echo "<input type='hidden' value='$facilityId' name='facilityIdToBook'>";
			echo "<input type='hidden' value='$customerId' name='custIdToBook'>";
			echo "<input type='hidden' value='$startDate' name='startDate'>";
			echo "<input type='hidden' value='$endDate' name='endDate'>";
			echo "<input type='hidden' value='$ratePerDay' name='ratePerDay'>";
			echo "<input type='submit' name='bookfacilityButton' value='BOOK' class='w3-button w3-red w3-round-xxlarge' style='margin: 10px;'>";
			echo '</form>';  
   echo '</td>';
   echo '</tr>';  

  $i++;	
  }
	  
echo '</table>'; 

}

function displaySearchOption()
{
echo '<div style="width:100%; margin:0 auto;">';
 echo '
<form action="" method="post">
<br>
<fieldset style ="width:70%;"><legend>Search Option</legend>
<table border=1>
<tr><td> Car Registration/FacilityName : </td><td><input type=text name=searchValue><br></td></tr>
<td></td><td><input type=submit name = searchBycustomerId value="By Registration">
<input type=submit name = searchByFacilityName value="By FacilityName">
<input type=submit name = searchByType value="By Type">
<input type=submit name = displayAll value="Display All"></td>
</table>
</fieldset>
</form>';
echo '</div>';
}

function getDayDiff($Date_rent_start,$Date_rent_end)
{
	$date1=date_create($Date_rent_start);
	$date2=date_create($Date_rent_end);
	$diff=date_diff($date1,$date2);
	$x = $diff->format("%R%a");//R - -ve and +ve symbol
	if($x >= 1)
		$x = $diff->format("%a");
	return $x;
}
?>
    </div>
</body>

</html>