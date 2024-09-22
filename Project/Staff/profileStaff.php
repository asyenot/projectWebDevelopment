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
            <h3 class="w3-padding-64"><b>UniRent Hub <br>(Staff)</br></h3>
        </div>

        <div class="w3-bar-block">
            <a href="../main/mainStaff.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
            <a href="../Customer/customerList.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Customer List</a>
            <a href="../facilityInformation/facilityList.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Facility List</a>
            <a href="../facilityInformation/facilityDoneRent.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Facility Rent</a>
            <a href="profileStaff.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Profile</a><br>
            <a href="../logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">LogOut</a>
        </div>
    </nav>

    <div class="w3-main" style="margin-left:340px;margin-right:40px">

        <div class="w3-container" style="margin-top:80px;" id="showcase">
            <h1 class="w3-jumbo"><b>Profile</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>

        <div>
            <?php
            session_start();
            include "../Staff/staff.php";

            if (!(isset($_SESSION['userId']) && $_SESSION['userId'] != '')) {
                header("Location: ../main/mainPage.php");
            }

            $staffId = $_SESSION['userId'];
			displayStaffInformation($staffId);
            echo '<form action="updatePersonalStaffForm.php" method="POST">';
                echo "<input type='hidden' name='staffIdToUpdate' value='$staffId'>";               
                echo '<input type="submit" value="update" name="updateStaffPersonalButton" class="w3-button w3-red w3-round-xxlarge" style="margin: 10px;">';
            echo '</form>';
			
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

function displayStaffInformation($staffId)
{

 echo '<div>';
 $staffInfo = getStaffPersonal($staffId);

 //display customer info
 

 echo '<fieldset style="width:60%;"><legend>Staff info:</legend>';
 echo '<table class="w3-table w3-bordered">';
 echo '<tr><th >Name   :</th><td>' .$staffInfo['staffName'].'</td></tr>';
 echo '<tr><th >Contact :</th><td>' .$staffInfo['phoneNumber'].'</td></tr>';
 echo '<tr><th>Email   :</th><td>' .$staffInfo['email'].'</td></tr>';
 
 
 echo '</table>';
 echo '</fieldset>';

}

?>
    </div>
</body>

</html>