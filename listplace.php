<?php  
	require 'connectdb.php';
	
 	$transport_id = $_GET['transport'];
 	$line_id = $_GET['line'];

	$query = "SELECT * FROM Go_By g
					 INNER JOIN Station s
					 ON g.station_id = s.station_id
					 INNER JOIN Near_By n
					 ON s.station_id = n.station_id
					 INNER JOIN Attraction a
					 ON a.place_id = n.place_id
					 WHERE g.transport_id = '$line_id'";
  $result = mysqli_query($dbcon, $query);

	$query_transport = "SELECT * FROM Transportation t
											INNER JOIN Type_Transport tt
											ON tt.type_id = t.transport_type
											WHERE t.transport_id = '$line_id'";
	$result_transport = mysqli_query($dbcon, $query_transport);
	$row_transport = mysqli_fetch_array($result_transport, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
<title>List Location</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Prompt">
<link rel="stylesheet" href="/css/css.css">
<style>
body{
    background:#eee;
}
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway","Prompt", Arial, Helvetica, sans-serif}
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

</head>

<body class="w3-light-grey">
	<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <ul>
  <li><a href="index.php" class="active w3-text-red w3-hover-red"><b><i class="fa fa-map-marker w3-margin-right"></i>Bangkok Attraction</b></a></li>
  <li style="float:right"><a class = "active w3-text-red w3-hover-red" href="about.php"><b>About</b></a></li>
</ul>
</div>
	<h3 align = "center">เดินทางโดย: <?php echo $row_transport['type_transport'] ?>  สาย: <?php echo $row_transport['transport_line'] ?> </h3>
<div class="container">
	<?php 
 	while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
 	  ?>
<div class="col-xs-12 col-md-6">
	<!-- First product box start here-->
	<div class="prod-info-main prod-wrap clearfix">
		<div class="row">
				<div class="col-md-5 col-sm-12 col-xs-12">
					<div class="product-image"> 
						<img src="<?php echo $row['place_picture'] ?>" class="img-responsive"> 
					</div>
				</div>
				<div class="col-md-7 col-sm-12 col-xs-12">
				<div class="product-deatil">
						<h5 class="name">
							<a href="place.php?place_name=<?php echo $row['place_name'] ?>" class="name" style="font-size:22px">
								<?php echo $row['place_name'] ?>
							</a>
							<a style="text-decoration:none">
								<span style="font-size:16px"><?php echo category($row['place_name'])  ?></span>
							</a>                            

						</h5>
						<p>
							<span><?php echo ($row['place_cost'] == 0)? "Free" : "฿{$row['place_cost']}" ?></span>
						</p>
						<span class="tag1"></span> 
				</div>
				<div class="description">
					<p><?php echo substr($row['place_detail'],0,350),"..." ?></p>
				</div> 
				<div class="product-info smart-form">
					<!--<div class="row">-->
						<div class="col-md-12"> 
								<a href="place.php?place_name=<?php echo $row['place_name'] ?>" class="btn btn-info">More info</a>
						</div>
					<!--</div>-->
				</div>
			</div>
		</div>
	</div>

	<!-- end product -->

</div>
<?php 
	}
	function category($place_name){
		$query_cate = "SELECT * FROM Attraction A
							INNER JOIN Place_Category P
							ON A.place_id = P.place_id
	            			INNER JOIN Type_Location L
	            			ON P.type_local_id = L.type_local_id
	            			WHERE A.place_name = '$place_name'";
  $result_cate = mysqli_query($GLOBALS['dbcon'], $query_cate);
  while($row_cate = mysqli_fetch_array($result_cate, MYSQLI_ASSOC)) {
	    $cate[] =  $row_cate['type_local_name'];
	  }
  $cate_str = '';
		for ($i = 0; $i < count($cate); $i++) {
		   $cate_str = $cate_str . " " . $cate[$i];
		   if($i != count($cate)-1){
		     $cate_str = $cate_str . "" . ",";
		   }
		}
		return $cate_str;
	}
?>

</div>
</body>

</html>