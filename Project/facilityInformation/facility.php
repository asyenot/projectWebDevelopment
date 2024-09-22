<?php
    function getListOfFacility(){
        $con = mysqli_connect("localhost","webs402024", "webs402024", "facilitydb");
        if(!$con){
            echo mysqli_connect_error();
        }else{
        
            $sql = "select * from facility";//create sql statement
            $qryFacilityList = mysqli_query($con,$sql);//run query - cakap lah kau nak apa?
           
            return $qryFacilityList;
        }
    }

    function deleteFacility(){
        $facilityIdToDelete = $_POST['facilityIdToDelete'];
        $con = mysqli_connect("localhost","webs402024", "webs402024", "facilitydb");
        if(!$con){
            echo mysqli_connect_error();
        }else{
            echo 'connected';
            $sql = "delete from facility where facilityId = '".$facilityIdToDelete."'";
            $qry=mysqli_query($con,$sql);
            echo $sql;
            return $qry;
        }
    }

    function addNewFacility(){
        $con = mysqli_connect("localhost","webs402024", "webs402024", "facilitydb");
        if(!$con){
            echo mysqli_connect_error();
        }else{
            $facilityId = $_POST['facilityId'];
            $facilityName = $_POST['facilityName'];
            $type = $_POST['type'];
            $capacity = $_POST['capacity'];
            $ratePerDay = $_POST['ratePerDay'];
            $status = $_POST['status'];
            //construct sql statement
            $sql = "insert into facility (facilityId, facilityName, type, capacity, ratePerDay, status) 
            values ('$facilityId','$facilityName','$type','$capacity','$ratePerDay','$status')";
            echo $sql;
            mysqli_query($con,$sql); //run qry
        }
        //fikir kau nak cakap apa? kau nak apa?
        
     }
    
     function searchFacilityByFacilityId(){
        $con = mysqli_connect("localhost","webs402024","webs402024","facilitydb");
        
        if(!$con){
            echo mysqli_connect_error();
        }else{
            $facilityIdToSearch=$_POST['searchKey'];
            $sql="select * from facility where facilityId='$facilityIdToSearch'";
            $qryFacilityList = mysqli_query($con,$sql);
            return $qryFacilityList;
        }
    }


    function getFacilityInformation($facilityId){
        $con = mysqli_connect("localhost","webs402024", "webs402024", "facilitydb");
        if(!$con){
            echo mysqli_connect_error();
        }else{
            $sql = "select * from facility where facilityId = '$facilityId'";//create sql statement
            $qryFacilityList =  mysqli_query($con,$sql);
            return $qryFacilityList;
        }
    }

    function updateFacility(){
        $con = mysqli_connect("localhost","webs402024", "webs402024", "facilitydb");
        if(!$con){
            echo mysqli_connect_error();
        }else{
            //echo 'in fucntion updateFacility())';
            //collect car info from the form
            $facilityId = $_POST['facilityId'];
            $facilityName = $_POST['facilityName'];
            $type = $_POST['type'];
            $capacity = $_POST['capacity'];
            $ratePerDay = $_POST['ratePerDay'];
            $status = $_POST['status'];
            //construct sql statement
            $sql = "update facility set facilityName = '$facilityName', type = '$type', capacity = '$capacity', 
                    ratePerDay = '$ratePerDay', status = '$status' where facilityId = '$facilityId'";
            echo $sql;
            mysqli_query($con,$sql); //run qry
        }
    }

    function getAvailableFacilityOnTheseDate($startDate ,$endDate)
    {
        $con = mysqli_connect('localhost','web2','web2','facilitydb');
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $sqlStr = "select facilityId,facilityName, type,capacity,ratePerDay from facility
        where facilityId not in(
        (SELECT distinct facilityId from booking";
        $sqlStr .= " where Date_rent_start BETWEEN '".$startDate."' AND '".$endDate."'";
        $sqlStr .= " or Date_rent_end BETWEEN '".$startDate."' AND '".$endDate."'))";
        //echo $sqlStr;
        $result = mysqli_query($con,$sqlStr);
        return $result;//if no car available, result will be empty
    }


?>