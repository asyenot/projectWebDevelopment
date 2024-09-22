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
            <a href="../Booking/bookFacilityForm.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Book List</a>
            <a href="../Booking/bookingListForm.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">View Booking</a>
            <a href="profileCustomer.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Profile</a><br>
            <a href="../logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">LogOut</a>
        </div>
    </nav>

    <div class="w3-main" style="margin-left:340px;margin-right:40px">

        <div class="w3-container" style="margin-top:80px;" id="showcase">
            <h1 class="w3-jumbo"><b>Profile</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>

        <div class="w3-container">
            <?php
            session_start();
            include "../Customer/customer.php";

            if (!(isset($_SESSION['userId']) && $_SESSION['userId'] != '')) {
                header("Location: ../main/mainPage.php");
            }

            $custId = $_SESSION['userId'];
			displayCustomerInformation($custId);
            echo '<form action="updatePersonalCustomerForm.php" method="POST">';
                echo "<input type='hidden' name='customerIdToUpdate' value='$custId'>";               
                echo '<input type="submit" value="update" name="updateCustomerPersonalButton" class="w3-button w3-red w3-round-xxlarge" style="margin: 10px;">';
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

function displayCustomerInformation($custId)
{

 echo '<div>';
 $customerInfo = getCustomerPersonal($custId);

 //display customer info
 
 echo '<fieldset style="width:60%;"><legend>Customer info:</legend>';
 echo '<table class="w3-table w3-bordered"      >';
 echo '<tr><th >Name   :</th><td>' .$customerInfo['custName'].'</td></tr>';
 echo '<tr><th >Contact :</th><td>' .$customerInfo['phoneNumber'].'</td></tr>';
 echo '<tr><th>Email   :</th><td>' .$customerInfo['email'].'</td></tr>';
 
 
 echo '</table>';
 echo '</fieldset>';

}

?>
    </div>
</body>

</html>