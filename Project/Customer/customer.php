<?php
//car.php
function getListOfCustomer(){
	
	$con = mysqli_connect("localhost","web2",
		"web2","facilitydb");
	if(!$con){
		echo mysqli_connect_error();
	}else{
		
		$sql="select * from customer";
		$qryCustomerList = mysqli_query($con,$sql); 
		
		return $qryCustomerList;
	}
}
function addCustomer(){
	
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	if(!$con){
		echo mysqli_connect_error();
	}else{
		echo 'connected';
		$customerId = $_POST['userId'];
		$custName = $_POST['custName'];
		$phoneNumber = $_POST['phoneNumber'];
		$email = $_POST['email'];
		
		$sql="insert into customer(customerId, custName, phoneNumber, email)
		VALUES ('$customerId', '$custName', '$phoneNumber', '$email')";
		echo $sql;
		mysqli_query($con,$sql);
	}
}
function deleteCustomer(){
	$customerIdToDelete=$_POST['customerIdToDelete'];
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	if(!$con){
	    echo mysqli_connect_error();
	}
	else{
		echo 'connected';
		$sql ="delete from customer where customerId='".$customerIdToDelete."'";
		echo $sql;
		$qry=mysqli_query($con,$sql);

		$sql_user ="delete from users where UserId='".$customerIdToDelete."'";
		echo $sql_user;
		$qry=mysqli_query($con,$sql_user);
	}
}

function searchCustomerByCustomerId(){
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	
	if(!$con){
		echo mysqli_connect_error();
	}else{
		$customerIdToSearch=$_POST['searchKey'];
		$sql="select * from customer where customerId='$customerIdToSearch'";
		$qryCustomerList = mysqli_query($con,$sql);
		return $qryCustomerList;
	}
}
function getCustomerInformation($customerId){
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	
	if(!$con){
		echo mysqli_connect_error();
		exit;	
	}else{
			$sql="select * from customer where customerId='$customerId'";
			$qryCustomerList = mysqli_query($con,$sql);
			return $qryCustomerList;
	}	
}
function getCustomerPersonal($customerId){
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	
	if(!$con){
		echo mysqli_connect_error();
		exit;	
	}else{
			$sql="select * from customer where customerId='$customerId'";
			$qryCustomerList = mysqli_query($con,$sql);
		if(mysqli_num_rows($qryCustomerList) == 1)
		{
			$row=mysqli_fetch_assoc($qryCustomerList);
			return $row;
		}
		else
		return false;
	}	
}
function updateCustomer(){
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	if(!$con){
		echo mysqli_connect_error();
	}else{
		//collect all field
		$customerId = $_POST['customerId'];
		$custName = $_POST['custName'];
		$phoneNumber = $_POST['phoneNumber'];
		$email = $_POST['email'];
		
		//prepare sql update
		$sql = "update customer SET custName='$custName', phoneNumber='$phoneNumber', email='$email' WHERE customerId = '$customerId'";
		//run query
		echo $sql;
		$qry=mysqli_query($con,$sql);
		return $qry;
	} 
}
function register(){
	include '../Staff/staff.php';
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	if(!$con){
		echo mysqli_connect_error();
	}else{
		echo 'connected';
		$userId = $_POST['userId'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$userType = $_POST['userType'];

		if($userType == "CUSTOMER"){
			$sql_user="insert into users(UserId, Password,Email, userType) VALUES ('$userId', '$password', '$email', '$userType')";
			echo $sql_user;
			echo mysqli_query($con,$sql_user);

			addCustomer();
		}else{
			$sql_user="insert into users(UserId, Password, userType) VALUES ('$userId', '$password', '$userType')";
			echo $sql_user;
			echo mysqli_query($con,$sql_user);

			addStaff();
		}
		
	}
}
?>