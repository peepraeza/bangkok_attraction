<?php  
	require 'connectdb.php';
	
 	$transport_id = $_GET['transport'];
 	$line_id = $_GET['line'];
  $query = "SELECT * FROM Attraction A
	              INNER JOIN Near_By N 
	              ON A.place_id = N.place_id
	              INNER JOIN Station S
	              ON N.station_id = S.station_id 
	              INNER JOIN Type_Transport TT
	              ON S.transport_type = TT.type_id
	              INNER JOIN Transportation T
	              ON T.transport_type = TT.type_id
	              WHERE T.transport_type = '$transport_id' AND T.transport_id='$line_id'";
  $result = mysqli_query($dbcon, $query);
	  
 	?>
 	<meta charset="UTF-8">
 	<?php 
 	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 	  ?>
 	<a href="place.php?place_name=<?php echo $row['place_name'] ?>"> <?php echo $row['place_name'] ?> </br> </a>
 	<?php 
 	}
 	?>
 	