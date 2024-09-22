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
            <h3 class="w3-padding-64"><b>UniRent Hub-Staff</br></h3>
        </div>

        <div class="w3-bar-block">
            <a href="../main/mainCustomer.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
            <a href="bookFacilityForm.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Book List</a>
            <a href="bookingListForm.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">View Booking</a>
            <a href="../staff/UpdateCustomer.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Profile</a><br>
            <a href="../logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">LogOut</a>
        </div>
    </nav>

    <div class="w3-main" style="margin-left:340px;margin-right:40px">

        <div class="w3-container" style="margin-top:80px;" id="showcase">
            <h1 class="w3-jumbo"><b>Add Facility</b></h1>
            <hr style="width:50px;border:5px solid red" class="w3-round">
        </div>

        
        <div class="w3-container ">
            <fieldset class=" w3-border w3-round-xlarge w3-pale-red w3-border-red"><legend>Select date to book:</legend>
            <form action="processFacility.php" method="POST">
            facility ID<input type="text" name="facilityId" placeholder="Enter facility ID" class="w3-input w3-border w3-round-large">
                <br>facility name<input type="text" name="facilityName" placeholder="Enter facility name" class="w3-input w3-border w3-round-large">
                <br>type<input type="text" name="type" placeholder="Enter type" class="w3-input w3-border w3-round-large">
                <br>capacity<input type="number" name="capacity" placeholder="Enter capacity" class="w3-input w3-border w3-round-large">
                <br>rate per day<input type="number" name="ratePerDay" placeholder="Enter rate per day" step="0.01" class="w3-input w3-border w3-round-large">
                <br>status<input type="text" name="status" placeholder="Enter status" class="w3-input w3-border w3-round-large">
                <br><input type="submit" name="saveFacilityButton" value="Save" class="w3-button w3-red w3-round-xxlarge">
                <a href="facilityList.php" class="w3-button w3-red w3-round-xxlarge">Back</a>
            </form>
            </fieldset>
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
    </div>
</body>

</html>