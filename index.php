<!DOCTYPE html>
<html>
<title>Bangkok Attraction</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript" src="jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
/*.myLink {display: none}*/
</style>
<body class="w3-light-grey">

<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <a href="#" class="w3-bar-item w3-button w3-text-red w3-hover-red"><b><i class="fa fa-map-marker w3-margin-right"></i>Bangkok Attraction</b></a>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
  <img class="w3-image" src="/w3images/bangkok.jpg" alt="London" width="1500" height="700">
  <div class="w3-display-middle" style="width:60%">
    <div class="w3-bar w3-black">
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Location');"><i class="fa fa-map-marker w3-margin-right"></i>Location</button>
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Transportation');"><i class="fa fa-car w3-margin-right"></i>Transportation</button>
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'Category');"><i class="fa fa-tags w3-margin-right"></i>Category</button>
    </div>

    <!-- Tabs -->
    <div id="Location" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Travel the bangkok with us</h3>
      <div class="w3-row-padding" style="margin:0 -16px;">
        <div class="w3-half">
          <label>Location</label>
          <form action="place.php??place_name=<?php echo $_GET['place_name'];?>" method="get" id="form1">
          <input class="w3-input w3-border" type="text" placeholder="Find Location" name="place_name" id="place_name">
        </div>
      </div>
      </br>
      <input type="submit" value="Search" class="w3-button w3-dark-grey">
      </form>
    </div>
   
   <?php  
	require 'connectdb.php';

  $query = "SELECT * FROM Type_Transport";
	$result = mysqli_query($dbcon, $query);
	?>
    <div id="Transportation" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Find locations from transportation</h3>
      <div class="w3-row-padding" style="margin:0 -16px;">
        <div class="w3-half">
          <form action="listplace.php??transport=<?php echo $_GET['transport'];?>??line=<?php echo $_GET['line'];?>" method="get" id="form1">
          <div class="form-group">
            <label for="sel1">Select Transport:</label>
            <select class="form-control" id="transport" name="transport">
              <option>-------Select-------</option>
              <?php
					    while($row = mysqli_fetch_array($result, MYSQLI_NUM)){
					       echo "<option value='$row[0]'>$row[1]</option>";
					      }
					    ?>
            </select>
          </div>
        </div>
        <div class="w3-half">
          <div class="form-group">
            <label for="sel1">Select Line:</label>
            <select class="form-control" id="line" name="line">
              <option>-------Select-------</option>
            </select>
          </div>
        </div>
      </div>
      <p><input type="submit" value="Search" class="w3-button w3-dark-grey"></p>
    </div>

    <div id="Category" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Find locations from categories</h3>
      <div class="w3-row-padding" style="margin:0 -16px;">
      <div class="w3-half">
      <div class="form-group">
        <label for="sel1">Select Category:</label>
        <select class="form-control" id="sel1">
          <option>Park</option>
          <option>Shopping Mall</option>
          <option>Musuem</option>
          <option>Temple</option>
        </select>
      </div>
      </div>
      </div>
      <p><button class="w3-button w3-dark-grey">Search</button></p>
    </div>
  </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px;">

  <!-- Explore Nature -->
  <div class="w3-container">
    <h3>Recommended Places</h3>
    <p>The place you need to go, When you come to Bangkok.</p>
  </div>
  <div class="w3-row-padding">
    <div class="w3-half w3-margin-bottom">
      <img src="https://www.w3schools.com/w3images/ocean2.jpg" alt="Norway" style="width:100%" class="w3-opacity w3-hover-opacity-off">
      <div class="w3-container w3-white">
        <h3>West Coast, Norway</h3>
        <p class="w3-opacity">Roundtrip from $79</p>
        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
        <button class="w3-button w3-margin-bottom">Buy Tickets</button>
      </div>
    </div>
    <div class="w3-half w3-margin-bottom">
      <img src="https://www.w3schools.com/w3images/mountains2.jpg" alt="Austria" style="width:100%" class="w3-opacity w3-hover-opacity-off">
      <div class="w3-container w3-white">
        <h3>Mountains, Austria</h3>
        <p class="w3-opacity">One-way from $39</p>
        <p>Praesent tincidunt sed tellus ut rutrum sed vitae justo.</p>
        <button class="w3-button w3-margin-bottom">Buy Tickets</button>
      </div>
    </div>
  </div>
   <!-- Good offers -->
  <div class="w3-row-padding w3-text-white w3-large">
    <div class="w3-half w3-margin-bottom">
      <div class="w3-display-container">
        <img src="http://www.travellifethailand.com/images/introc_1338899602/515ab26c135e92eL.jpg" alt="prakeaw" style="width:100%" class="w3-opacity w3-hover-opacity-off">
        <span class="w3-display-bottomleft w3-padding">วัดพระแก้ว</span>
      </div>
    </div>
    <div class="w3-half">
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="http://customercarecontacts.com/wp-content/uploads/2017/01/simi-paragon.jpg" alt="New York" style="width:100%" class="w3-opacity w3-hover-opacity-off">
            <span class="w3-display-bottomleft w3-padding">New York</span>
          </div>
        </div>
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="https://www.w3schools.com/w3images/sanfran.jpg" alt="San Francisco" style="width:100%" class="w3-opacity w3-hover-opacity-off">
            <span class="w3-display-bottomleft w3-padding">San Francisco</span>
          </div>
        </div>
      </div>
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="https://www.w3schools.com/w3images/pisa.jpg" alt="Pisa" style="width:100%" class="w3-opacity w3-hover-opacity-off">
            <span class="w3-display-bottomleft w3-padding">Pisa</span>
          </div>
        </div>
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="https://www.w3schools.com/w3images/paris.jpg" alt="Paris" style="width:100%" class="w3-opacity w3-hover-opacity-off">
            <span class="w3-display-bottomleft w3-padding">Paris</span>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</div>

<!-- Footer -->
<footer class="w3-container w3-center w3-opacity w3-margin-bottom">
  <h5>Find Us On</h5>
  <div class="w3-xlarge w3-padding-12">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  </footer>

<script>
// Tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
      x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>
<script>
	$(document).ready(function() {
	$("#transport").change(function() {
		var transport_id = $(this).val();
		if(transport_id != "") {
			$.ajax({
				url:"get_line.php",
				data:{type_id:transport_id},
				type:'POST',
				success:function(response) {
					var resp = $.trim(response);
					$("#line").html(resp);
				}
			});
		} else {
			$("#line").html("<option value=''>------- Select --------</option>");
		}
	});
});
</script>

</body>
</html>
