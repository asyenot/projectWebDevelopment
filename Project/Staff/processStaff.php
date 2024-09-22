<?php

include "staff.php";
if(isSet($_POST['updateStaffPersonalButton'])){
		updateStaff();
		header('Location: profileStaff.php');
}



?>