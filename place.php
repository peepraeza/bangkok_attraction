<?php  
	require 'connectdb.php';
	
 	$place_name = $_GET['place_name'];
  $query = "SELECT * FROM Near_By n
                      INNER JOIN Attraction a
                      ON n.place_id = a.place_id 
                      INNER JOIN Place_Category p
                      ON a.place_id = p.place_id
                      INNER JOIN Type_Location l
                      ON p.type_local_id = l.type_local_id
                      WHERE a.place_name = '$place_name'";
	$result = mysqli_query($dbcon, $query);
  
	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	  $name = $row['place_name'];
	  $fee = $row['place_cost'];
	  $catagory[] = $row['type_local_name'];
	  $detail = $row['place_detail'];
	  $picture = $row['place_picture'];
	 $station_id[] =  $row['station_id'];
	}
	$catagory = array_values(array_unique($catagory));

	for($i = 0; $i < count($station_id); $i++){
	  $query2 = "SELECT * FROM Station s
	              INNER JOIN Go_By g 
	              ON s.station_id = g.station_id 
	              INNER JOIN Transportation t
	              ON g.transport_id = t.transport_id
	              INNER JOIN Type_Transport tt
	              ON t.transport_type = tt.type_id
	              WHERE s.station_id = '$station_id[$i]'";
	  $result2 = mysqli_query($dbcon, $query2);
	  while($row2 = mysqli_fetch_array($result2, MYSQLI_ASSOC)) {
	    $station_name[] =  $row2['station_name'];
	    $station_transport[] =  $row2['type_transport'];
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
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family:"Prompt", Arial, Helvetica, sans-serif}

table,th,td{
			border: 1px solid black;
			border-collapse: collapse;
		}
		ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #fff;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 8px 14px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #000;
    text-decoration: none;
}

</style>
<body>
<body class="w3-light-grey">
	<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <ul>
  <li><a href="index.php" class="active w3-text-red w3-hover-red"><b><i class="fa fa-map-marker w3-margin-right"></i>Bangkok Attraction</b></a></li>
  <li style="float:right"><a class = "active w3-text-red w3-hover-red" href="about.php"><b>About</b></a></li>
</ul>
</div>
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
      <p class="w3-large">ประเภท : <?php echo category($catagory) ?></p>
      <p class="w3-large">ค่าเข้า : <?php echo ($fee == 0)? "Free" : $fee ?></p>
      </div>
  </div>
  
  <?php 
    $query_transport = "SELECT * FROM Near_By n
                      INNER JOIN Attraction a
                      ON n.place_id = a.place_id 
                      INNER JOIN Station s
                      ON s.station_id = n.station_id
                      INNER JOIN Type_Transport t
                      ON t.type_id = s.transport_type
                      WHERE a.place_name = '$place_name'";
    $transport = mysqli_query($dbcon, $query_transport);
	  while($row_transport = mysqli_fetch_array($transport, MYSQLI_ASSOC)) {
	    $vehicle[] =  $row_transport['type_transport'];
	  }
	  
	 function category($category){
	   $category_str = '';
    			for ($i = 0; $i < count($category); $i++) {
    			   $category_str = $category_str . " " . $category[$i];
    			   if($i != count($category)-1){
    			     $category_str = $category_str . "" . ",";
    			   }
    			}
    			return $category_str;
	 }

	 function line($vehicle, $place_name){
	   $query_line = "SELECT * FROM Go_By g
					          INNER JOIN Station s
					          ON g.station_id = s.station_id
					          INNER JOIN Near_By n
					          ON s.station_id = n.station_id
					          INNER JOiN Transportation t
					          ON t.transport_id = g.transport_id
					          INNER JOIN Type_Transport tt
					          ON tt.type_id = t.transport_type AND tt.type_id = s.transport_type
					          INNER JOIN Attraction a
					          ON a.place_id = n.place_id
                    WHERE a.place_name = '$place_name' AND tt.type_transport = '$vehicle'";
    $result_line = mysqli_query($GLOBALS['dbcon'], $query_line);
	  while($row_line = mysqli_fetch_array($result_line, MYSQLI_ASSOC)) {
	    $line[] =  $row_line['transport_line'];
	  }
	   $line_str = '';
    			for ($i = 0; $i < count($line); $i++) {
    			   $line_str = $line_str . " " . $line[$i];
    			   if($i != count($line)-1){
    			     $line_str = $line_str . "" . ",";
    			   }
    			}
    			return $line_str;
	 }
	 
	 function station($vehicle, $place_name){
	   $query_station = "SELECT * FROM Near_By n
                      INNER JOIN Attraction a
                      ON n.place_id = a.place_id 
                      INNER JOIN Station s
                      ON s.station_id = n.station_id
                      INNER JOIN Type_Transport t
                      ON t.type_id = s.transport_type
                      WHERE a.place_name = '$place_name' AND t.type_transport = '$vehicle'";
    $result_station = mysqli_query($GLOBALS['dbcon'], $query_station);
	  while($row_station = mysqli_fetch_array($result_station, MYSQLI_ASSOC)) {
	    $station =  $row_station['station_name'];
	  }
	   return $station;
	 }
  ?>
  
   <h3>การเดินทางมายัง <?php echo $name ?></h3>
  
		<table class="w3-table-all" style="width: 70%">
		<tr class="w3-blue">
			<th>Vehicle</th>
			<th style="width: 50%">Line</th>
			<th>Station</th>
		</tr>
    		<?php  
    			for($i = 0; $i < count($vehicle); $i++){
    				
    		?>
    		<tr>
    			<td><?php echo $vehicle[$i] ?></td>
    			<td><?php echo line($vehicle[$i],$place_name) ?></td>
    			<td><?php echo station($vehicle[$i], $place_name) ?></td>
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
