<?php 
function getStaffPersonal($staffId){
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	
	if(!$con){
		echo mysqli_connect_error();
		exit;	
	}else{
			$sql="select * from staff where staffId ='$staffId'";
			$qryStaffList = mysqli_query($con,$sql);
		if(mysqli_num_rows($qryStaffList) == 1)
		{
			$row=mysqli_fetch_assoc($qryStaffList);
			return $row;
		}
		else
		return false;
	}	
}
function getStaffInformation($staffId){
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	
	if(!$con){
		echo mysqli_connect_error();
		exit;	
	}else{
			$sql="select * from staff where staffId ='$staffId'";
			$qryStaffList = mysqli_query($con,$sql);
			return $qryStaffList;
	}	
}
function updateStaff(){
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	if(!$con){
		echo mysqli_connect_error();
	}else{
		//collect all field
		$staffId = $_POST['staffId'];
		$staffName = $_POST['staffName'];
		$phoneNumber = $_POST['phoneNumber'];
		$email = $_POST['email'];
		
		//prepare sql update
		$sql = "update staff SET staffName='$staffName', phoneNumber='$phoneNumber', email='$email' WHERE staffId = '$staffId'";
		//run query
		echo $sql;
		$qry=mysqli_query($con,$sql);
		return $qry;
	}
}
function addStaff(){
	
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	if(!$con){
		echo mysqli_connect_error();
	}else{
		echo 'connected';
		$staffId = $_POST['userId'];
		$staffName = $_POST['staffName'];
		$phoneNumber = $_POST['phoneNumber'];
		$email = $_POST['email'];
		
		$sql="insert into staff(staffId, email)VALUES ('$staffId', '$email')";
		echo $sql;
		echo mysqli_query($con,$sql);
	}
}
?>