<?php  
	require 'connectdb.php';
	
 	$catagory_id = $_GET['catagory'];

  $query = "SELECT * FROM Attraction A
	              INNER JOIN Type_Location L
	              ON A.place_catagory = L.type_local_id
	              WHERE A.place_catagory = '$catagory_id'";
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
 	