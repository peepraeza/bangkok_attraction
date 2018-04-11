<?php  
	require 'connectdb.php';
	
// 	$place_id = $_POST['place_id'];
// 	$place_name = $_POST['place_name'];
// 	$pro_dateadd = $_POST['pro_dateadd'];
// 	$pro_status =  $_POST['pro_status'];
// 	$pt_id = $_POST['pt_id'];
	
	$inset = "INSERT INTO Station (station_name, station_transport) VALUES ('สยาม', 'bts'), ('พร้อมพงษ์', 'bts')";
	    
    $result = mysqli_query($dbcon, $inset);
    
    if($result){
		echo "item added";
	}else{
		echo "item not added".mysqli_error($dbcon);
	}
	
	mysqli_close($dbcon);