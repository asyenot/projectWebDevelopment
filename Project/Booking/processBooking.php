<?php
session_start();
//processBooking.php
include "booking.php";
//include "../email/email.php";
if(isSet($_POST['bookfacilityButton']))//customer selected a car
	{
	$success=addNewBookingRecord();
	if($success)
		{
			 echo '<script>
				alert("Your booking has been updated.")
				window.location = "bookingListForm.php";
			</script>';
			
			//send email notification
			//sendBookingConfirmationEmail();
			
/* 			echo '<script>
				alert("Your booking has been updated. Kindly complete the payment")
				window.open("http://www.maybank2u.com.my/");
				window.location = "../customerMenu.php";
				
			</script>'; */

  }
else
		{
		echo '<script>
				alert("There is an error in processing your booking. Kindly contact our customer service.");
				window.location = "../main/mainCustomer.php";
			</script>';	
		}
	}
?>