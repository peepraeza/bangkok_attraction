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
	    echo $row2['station_name'];
	    echo " ";
	    echo $row2['station_transport'];
	    echo " ";
	    echo $row2['transport_line'];
	  }
	}
?>

<!DOCTYPE html>
<html>
<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<style>
body {font-family: "Times New Roman", Georgia, Serif;}
h1,h2,h3,h4,h5,h6 {
    font-family: "Playfair Display";
    letter-spacing: 5px;
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
  
  <!-- Menu Section -->
  <div class="w3-row w3-padding-64" id="menu">
    <div class="w3-col l6 w3-padding-large">
      <h1 class="w3-center">Our Menu</h1><br>
      <h4>Bread Basket</h4>
      <p class="w3-text-grey">Assortment of fresh baked fruit breads and muffins 5.50</p><br>
    
      <h4>Honey Almond Granola with Fruits</h4>
      <p class="w3-text-grey">Natural cereal of honey toasted oats, raisins, almonds and dates 7.00</p><br>
    
      <h4>Belgian Waffle</h4>
      <p class="w3-text-grey">Vanilla flavored batter with malted flour 7.50</p><br>
    
      <h4>Scrambled eggs</h4>
      <p class="w3-text-grey">Scrambled eggs, roasted red pepper and garlic, with green onions 7.50</p><br>
    
      <h4>Blueberry Pancakes</h4>
      <p class="w3-text-grey">With syrup, butter and lots of berries 8.50</p>    
    </div>
    
    <div class="w3-col l6 w3-padding-large">
      <img src="/w3images/tablesetting.jpg" class="w3-round w3-image w3-opacity-min" alt="Menu" style="width:100%">
    </div>
  </div>

  <hr>

  <!-- Contact Section -->
  <div class="w3-container w3-padding-64" id="contact">
    <h1>Contact</h1><br>
    <p>We offer full-service catering for any event, large or small. We understand your needs and we will cater the food to satisfy the biggerst criteria of them all, both look and taste. Do not hesitate to contact us.</p>
    <p class="w3-text-blue-grey w3-large"><b>Catering Service, 42nd Living St, 43043 New York, NY</b></p>
    <p>You can also contact us by phone 00553123-2323 or email catering@catering.com, or you can send us a message here:</p>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16" type="number" placeholder="How many people" required name="People"></p>
      <p><input class="w3-input w3-padding-16" type="datetime-local" placeholder="Date and time" required name="date" value="2017-11-16T20:00"></p>
      <p><input class="w3-input w3-padding-16" type="text" placeholder="Message \ Special requirements" required name="Message"></p>
      <p><button class="w3-button w3-light-grey w3-section" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-center w3-light-grey w3-padding-32">
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" title="W3.CSS" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

</body>
</html>
