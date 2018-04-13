<?php  
	require 'connectdb.php';
	
 	$place_name = $_GET['place_name'];
// 	$query = "SELECT * FROM Attraction WHERE place_name='$place_name'";
// 	$result = mysqli_query($dbcon, $query);
// 	$row = mysqli_fetch_array($result, MYSQLI_ASSOC)
	$query = "SELECT * FROM Near_By INNER JOIN Attraction ON Near_By.place_id = Attraction.place_id WHERE Attraction.place_name = '$place_name'";
	$result = mysqli_query($dbcon, $query);
  

	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	  $name = $row['place_name'];
	  $fee = $row['place_cost'];
	  $catagory = $row['place_catagory'];
	  $detail = $row['place_detail'];
	  $picture = $row['place_picture'];
	 $station_id[] =  $row['station_id'];
	}
	for($i = 0; $i < count($station_id); $i++){
	  $query2 = "SELECT * FROM Station s
	              INNER JOIN Go_By g 
	              ON s.station_id = g.station_id 
	              INNER JOIN Transportation t
	              ON g.transport_id = t.transport_id
	              WHERE s.station_id = '$station_id[$i]'";

	  $result2 = mysqli_query($dbcon, $query2);
	  while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
	    $station_name[] =  $row2['station_name'];
	    $station_transport[] =  $row2['station_transport'];
	    $transport_line[] =  $row2['transport_line'];
	  }
	}
?>

<!DOCTYPE html>
<html>
<title><?php echo $name ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 5px;
}
table,th,td{
			border: 1px solid black;
			border-collapse: collapse;
		}
</style>
<body>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px">

  <!-- About Section -->
  <div class="w3-row w3-padding-32" id="about">
    <div class="w3-col m6 w3-padding-large w3-hide-small">
     <img src="<?php echo $picture ?>" class="w3-round w3-image" alt="Table Setting" width="600" height="750">
    </div>

    <div class="w3-col m6 w3-padding-large">
      <h1 class="w3-center"><?php echo $name ?></h1><br>
      <p class="w3-large" style="text-indent: 2.5em;"><?php echo $detail ?></p>
      <p class="w3-large">Catagory : <?php echo $catagory ?></p>
      <p class="w3-large">Entrance Fee : <?php echo ($fee == 0)? "Free" : $fee ?></p>
      </div>
       
  </div>
 <hr>
  <h2>ตารางยานพาหนะ</h2>
  
	   <table style="width: 900px">
		<tr>
			<td><b>Vehicle</b></td>
			<td><b>Line</b></td>
			<td><b>Station</b></td>
		</tr>
    		<?php  
    			for($i = 0; $i < count($station_name); $i++){
    				
    		?>
    		<tr>
    			<td><?php echo $station_transport[$i] ?></td>
    			<td><?php echo $transport_line[$i] ?></td>
    			<td><?php echo $station_name[$i] ?></td>
    		</tr>
		    <?php  } 
		        mysqli_free_result($result);
		        mysqli_close($dbcon);
		    ?>
	    </table>
 <hr>
 
<script>
    console.clear();
    var table = $("table");
    var rows = table.find($("tr"));
    var colsLength = $(rows[0]).find($("td")).length;
    var removeLater = new Array();
    for (var i = 0; i < colsLength; i++) {
      var startIndex = 0;
      var lastIndex = 0;
      var startText = $($(rows[0]).find("td")[i]).text();
      for (var j = 1; j < rows.length; j++) {
        var cRow = $(rows[j]);
        var cCol = $(cRow.find("td")[i]);
        var currentText = cCol.text();
        if (currentText == startText) {
          cCol.css("background", "gray");
          console.log(cCol);
          removeLater.push(cCol);
          lastIndex = j;
        } else {
          var spanLength = lastIndex - startIndex;
          if (spanLength >= 1) {
            console.log(lastIndex + " - " + startIndex)
            //console.log($($(rows[startIndex]).find("td")[i]))
            $($(rows[startIndex]).find("td")[i]).attr("rowspan", spanLength + 1);
          }
          lastIndex = j;
          startIndex = j;
          startText = currentText;
        }
    
      }
      var spanLength = lastIndex - startIndex;
      if (spanLength >= 1) {
        console.log(lastIndex + " - " + startIndex)
        //console.log($($(rows[startIndex]).find("td")[i]))
        $($(rows[startIndex]).find("td")[i]).attr("rowspan", spanLength + 1);
      }
      console.log("---");
    }
    
    for (var i in removeLater) {
      $(removeLater[i]).remove();
    }

</script>
</body>

</html>
