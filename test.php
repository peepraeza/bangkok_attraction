<?php  
	require 'connectdb.php';
	
	$query = "SELECT Near_By.station_id FROM Near_By INNER JOIN Attraction ON Near_By.place_id = Attraction.place_id WHERE Attraction.place_id = '1'";
	$result = mysqli_query($dbcon, $query);


	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	 $station_id[] =  $row['station_id'];
	}
	for($i = 0; $i < count($station_id); $i++){
	  $query2 = "SELECT * FROM Station s
	              INNER JOIN Go_By g 
	              ON s.station_id = g.station_id 
	              INNER JOIN Transportation t
	              ON g.transport_id = t.transport_id
	              WHERE s.station_id = '$station_id[$i]'";
	  //$query2 = "SELECT * FROM Station WHERE station_id = '$station_id[$i]'";

	  $result2 = mysqli_query($dbcon, $query2);
	  while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
	    echo $row2['station_name'];
	    echo " ";
	    echo $row2['station_transport'];
	    echo " ";
	    echo $row2['transport_line'];
	  }
	}
	 // $query2 = "SELECT station_name, station_transport FROM Station WHERE station_id = '$station_id'";
	 // $result2 = mysqli_query($dbcon, $query2);
	 // while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
	    
	   // echo $row2['station_name'];

	    //echo $row2['station_transport'];
	  //echo count($station_id);
	 // echo $station_id[1];
	
?>

<meta charset="UTF-8">
