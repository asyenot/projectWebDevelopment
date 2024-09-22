<?php
include ("facility.php");
print_r($_POST);
if(isset($_POST['deleteFacilityButton'])){
    echo 'to delete '.$_POST['facilityIdToDelete'];
    //delete la..
    deleteFacility();
    header('Location:facilityList.php');

}else if(isset($_POST['saveFacilityButton'])){
    echo 'nak save new record';
    addNewFacility();
    header('Location:facilityList.php');  

}else{
    if(isset($_POST['updateFacilityButton'])){
        echo 'nak save new record';
        updateFacility();
        header('Location:facilityList.php');    
    }
}
?>