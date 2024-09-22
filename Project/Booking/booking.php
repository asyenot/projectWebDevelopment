<?php
function addNewBookingRecord()
{
$con = mysqli_connect("localhost","web2","web2","facilitydb");
if(!$con)
	{
	echo mysqli_connect_error();
	exit;
	}
 //collect data from post array or system 
 
 $customerId = $_POST['custIdToBook'];
 $facilityId = $_POST['facilityIdToBook'];
 $date_Res = date("Y-m-d");
 $date_rent_start = $_POST['startDate'];

 $booking_ref=$customerId.$facilityId.$date_rent_start;

 $date_rent_end= $_POST['endDate'];
 $rental_period=getDayDiff($date_rent_start,$date_rent_end);

 $total = $rental_period *  $_POST['ratePerDay'];
 $tax=0.06 * $total;
 $amount_due = $tax + $total;
 
  
  $sql="INSERT INTO booking (booking_ref,customerId, res_by,date_Res,date_rent_start,date_rent_end,facilityId,rental_period, amount_paid )
	VALUES ('$booking_ref','$customerId','$customerId','$date_Res','$date_rent_start','$date_rent_end','$facilityId','$rental_period','$amount_due')";
	$qry = mysqli_query($con,$sql); 
	if(mysqli_affected_rows($con) !=0)
		return true;
	else
		return false;

}

function getListOfFutureBookingByCustomer($custId)
{
//create connection
$con=mysqli_connect("localhost","web2","web2","facilitydb");
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
//get list of future or active booking, sort by  date start
$sql = "select * from booking where customerId = '".$custId."'";      
$sql .= " and (date_rent_start >= CURDATE() or date_rent_end >= CURDATE())";
$sql .= " order by date_rent_start";
$qry = mysqli_query($con,$sql);//run query
return $qry; 

}
//getListOfPastBookingByCustomer function==================
function getListOfPastBookingByCustomer($custId)
{
//create connection
$con=mysqli_connect("localhost","web2","web2","facilitydb");
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
//get list of past booking
$sql = "select * from booking where customerId = '".$custId."'";      
$sql .= " and (date_rent_start < CURDATE() AND date_rent_end < CURDATE())";
$sql .= " order by date_rent_start";
$qry = mysqli_query($con,$sql);//run query
return $qry; 

} 
function getListOfPastBookingByAllCustomer()
{
//create connection
$con=mysqli_connect("localhost","web2","web2","facilitydb");
if(!$con)
	{
	echo  mysqli_connect_error(); 
	exit;
	}
//get list of past booking
$sql = "select * from booking ";      
$sql .= " order by date_rent_start";
$qry = mysqli_query($con,$sql);//run query
return $qry; 

}
function searchFacilityByCustomerId(){
	$con = mysqli_connect("localhost","web2","web2","facilitydb");
	
	if(!$con){
		echo mysqli_connect_error();
	}else{
		$customerIdToSearch=$_POST['searchKey'];
		$sql="select * from booking where customerId='$customerIdToSearch'";
		$qryCustomerList = mysqli_query($con,$sql);
		return $qryCustomerList;
	}
}
//getDayDiff function==================
function getDayDiff($Date_rent_start,$Date_rent_end)
{
	$date1=date_create($Date_rent_start);
	$date2=date_create($Date_rent_end);
	$diff=date_diff($date1,$date2);
	$x = $diff->format("%R%a");//R - -ve and +ve symbol
	if($x >= 1)
		$x = $diff->format("%a");
	return $x;
}
?>