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
            <h1 class="w3-jumbo"><b>Booking History</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>

        <div class="w3-container">
            <?php
            session_start();
            include "../Customer/customer.php";
            include "../facilityInformation/facility.php";
			include "booking.php";

            if (!(isset($_SESSION['userId']) && $_SESSION['userId'] != '')) {
                header("Location: ../main/mainPage.php");
            }

            $custId = $_SESSION['userId'];
			//displayCustomerInformation($custId);
			$qryActiveAndFutureList = getListOfFutureBookingByCustomer($custId);//in booking.php
			$qryPastBooking = getListOfPastBookingByCustomer($custId);
			showBookingList($qryActiveAndFutureList,"Active/Future Booking");
			showBookingList($qryPastBooking,"Completed Booking");
			
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
    
    </script>
<?php   

function showBookingList($qryBookingList,$listType)
{

//display car info	
$noOfBookingRecord=mysqli_num_rows($qryBookingList);

if($noOfBookingRecord == 0) //no booking record
	{
    echo '<div class="w3-round-xlarge w3-red w3-large" style="text-align:center; padding: 10px;margin: 10px;" >There is no record for '. $listType.' found </div>';
	return;
	}
    echo '<div class="w3-round-xlarge w3-red w3-large" style="text-align:center; padding: 10px;" >List of '. $listType.'. '.$noOfBookingRecord.' record/s found </div>';
    echo '<table class="w3-margin w3-table-all w3-card-4" style="width: 98%;">';
    echo '<tr class="w3-red" style=" border-radius: 10px;">
		<td>No</td>
		<td>FacilityId</td>
		<td>Start Date</td>
		<td>End Date</td>
		<td>Charges RM</td>
	</tr>';
$i=1;
while($row=mysqli_fetch_assoc($qryBookingList))//Display car information
  {
   
  $startDate=date_create($row['date_rent_start']);
  $endDate=date_create($row['date_rent_end']);
 // echo date_format($date,"Y/m/d H:i:s"); 
  echo '<tr class="w3-hover-pale-red">';
//  echo '<tr class="w3-green w3-hover-shadow w3-padding-64 w3-center" style="width:70%">';
  echo '<td>'.$i.'</td >';
  echo '<td>'.$row['facilityId'].'</td>';
  echo '<td>'.date_format($startDate,"d/m/Y").'</td>';
  echo '<td>'.date_format($endDate,"d/m/Y").'</td>';
  echo '<td>'.number_format($row['amount_paid'],2).'</td>';
  echo '</tr>';  
  echo '</div>';
  $i++;
  }
	  
echo '</table>'; 

}

function displaySearchOption()
{
 echo '
<form action="" method="post">
<br>
<fieldset style ="width:70%;"><legend>Search Option</legend>
<table border=1>
<tr><td> Facility Id/Name : </td><td><input type=text name=searchValue><br></td></tr>
<td></td><td><input type=submit name = searchByfacilityId value="By Registration">
<input type=submit name = searchByName value="By Name">
<input type=submit name = searchByType value="By Type">
<input type=submit name = displayAll value="Display All"></td>
</table>
</fieldset>
</form>';
}
?>
    </div>
</body>

</html>