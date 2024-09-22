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
		
	</style>
</head>

<body>

	<nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
		<a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close</a>

		<div class="w3-container">
			<h3 class="w3-padding-64"><b>UniRent Hub <br>(Staff)</b></h3>
		</div>

		<div class="w3-bar-block">
			<a href="../main/mainStaff.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Home</a>
			<a href="#" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Customer List</a>
			<a href="../facilityInformation/facilityList.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Facility List</a>
			<a href="../facilityInformation/facilityDoneRent.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Facility Rent</a>
			<a href="../staff/profileStaff.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Profile</a><br>
			<a href="../logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">LogOut</a>
		</div>
	</nav>

	<div class="w3-main" style="margin-left:340px;margin-right:40px">
		
		<div class="w3-container" style="margin-top:80px;" id="showcase">
			<h1 class="w3-jumbo"><b>Customer List</b></h1>
			<hr style="width:50px;border:5px solid red" class="w3-round">
		</div>

		<div class="w3-container">
			<?php
			session_start();
			if (!(isset($_SESSION['userId']) && $_SESSION['userId'] != '')) {
				header ("Location: ../login/loginStaff.php");
			}
			//carList.php
			include "customer.php";
			displaySearchPanel();
			if (isset($_POST['searchByCustomerId']))
				$qryCustomerList = searchCustomerByCustomerId();
			else
				$qryCustomerList = getListOfCustomer();

			//create table //display each record
			echo '<table class="w3-margin w3-table-all w3-card-4" style="width: 98%;">';
			echo '<tr class="w3-red" style=" border-radius: 10px;">
				<th>No</th>
				<th>Customer ID</th>
				<th>Customer Name</th>
				<th>Phone Number</th>
				<th>Email</th>
				<th colspan="2" style="padding-left:70px;">Option</th>
				
		  </tr>';

			$no = 1;
			while ($row = mysqli_fetch_assoc($qryCustomerList)) {
				$customerId = $row['customerId'];
				echo '<tr class="w3-hover-pale-red">';
				echo '<td>' . $no . '</td>';
				echo '<td>' . $row['customerId'] . '</td>';
				echo '<td>' . $row['custName'] . '</td>';
				echo '<td>' . $row['phoneNumber'] . '</td>';
				echo '<td>' . $row['email'] . '</td>';
				echo '<td>';
					echo '<form action="processCustomer.php" method="POST">';
						echo "<input type='hidden' name='customerIdToDelete' value='$customerId'>";               
						echo '<input type="submit" value="delete" name="deleteCustomerButton" class="w3-button w3-red w3-round-xxlarge w3-right" style="width: 80px; margin:10px">';
					echo '</form>';
				echo '</td>';
				echo '<td>';
					echo '<form action="updateCustomerForm.php" method="POST">';
						echo "<input type='hidden' name='customerIdToUpdate' value='$customerId'>";               
						echo '<input type="submit" value="update" name="updateCustomerButton" class="w3-button w3-red w3-round-xxlarge" style="margin:10px">';
					echo '</form>';	  
                echo '</td>';

				echo '</tr>';
				$no++;
			}
			echo '</table>';
			
			?>
		</div>


		<header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
			<a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
			<span>UniRent Hub</span>
		</header>

		<div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

		

	</div>
	<?php
	function displaySearchPanel()
	{
		echo '<div class="w3-container ">';
		echo '<fieldset class=" w3-border w3-round-xlarge w3-pale-red w3-border-red"><legend>Search:</legend>';
		echo '<form action="" method="POST">';
		echo '<input type="text" name="searchKey" placeholder="Enter customerId to search" class="w3-input w3-border w3-round-large">';
		echo '<input type="submit" value="search" name="searchByCustomerId"  class="w3-button w3-red w3-round-xxlarge" style="margin:5px;">';
		echo '<input type="submit" value="all" name="showAllButton"  class="w3-button w3-red w3-round-xxlarge">';
		echo '</form>';
		echo '</fieldset>';
		echo '</div>';
	}
	?>
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