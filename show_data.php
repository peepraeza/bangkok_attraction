<?php  
	require 'connectdb.php';
	
	$place_name = $_GET['place_name'];
	$query = "SELECT * FROM Attraction WHERE place_name='$place_name'";
	$result = mysqli_query($dbcon, $query);
?>

<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
	<title>แสดงรายการสินค้า</title>
	<style>
			table,th,td{
			border: 1px solid black;
			border-collapse: collapse;
		}
	</style>
	</head>
	
	<body>
	    <h2>list</h2>
	   <table style="width: 900px">
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Detail</th>
			<th>Cost</th>
			<th>Catagory</th>
		</tr>
    		<?php  
    			while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    				
    		?>
    		<tr>
    			<td><?php echo $row['place_id'] ?></td>
    			<td><?php echo $row['place_name'] ?></td>
    			<td><?php echo $row['place_detail'] ?></td>
    			<td><?php echo number_format($row['place_cost'],2) ?></td>
    			<td><?php echo $row['place_catagory'] ?></td>
    		</tr>
		    <?php  } 
		        mysqli_free_result($result);
		        mysqli_close($dbcon);
		    ?>
	    </table>
</body>
</html>