<?php

include "customer.php";
//print_r($_POST);
if(isSet($_POST['deleteCustomerButton'])){
	deleteCustomer();
	header('Location: customerList.php');
}
else if(isSet($_POST['saveCustomerButton'])){
	
	addCustomer();
	header('Location: customerList.php');	//redirect
}
else if(isSet($_POST['updateCustomerButton'])){
	updateCustomer();
	header('Location: customerList.php');

}else if(isSet($_POST['updateCustomerPersonalButton'])){
		updateCustomer();
		header('Location: profileCustomer.php');

}  
else{
	if((isSet($_POST['registerUserButton']))); // kalau tak ada input atau email sama keluar register.php semula!!
	register();
	header('Location:../main/mainPage.php');	//redirect
}


?>