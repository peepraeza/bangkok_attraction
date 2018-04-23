<!DOCTYPE html>
<html>
<title>Bangkok Attraction</title>
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
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", "Prompt", Arial, Helvetica, sans-serif}
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
          <form action="listname.php??place_name=<?php echo $_GET['place_name'];?>" method="get" id="form1">
          <input class="w3-input w3-border" type="text" placeholder="Find Location" name="place_name" id="place_name">
        </div>
      </div>
      </br>
      <input type="submit" value="Search" class="w3-button w3-dark-grey">
      </form>
    </div>
   
   <?php  
	require 'connectdb.php';

  $query = "SELECT * FROM Type_Transport ORDER BY Type_Transport";
	$result = mysqli_query($dbcon, $query);
	?>
    <div id="Transportation" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Find locations from transportation</h3>
      <div class="w3-row-padding" style="margin:0 -16px;">
        <div class="w3-half">
          <form action="listplace.php??transport=<?php echo $_GET['transport'];?>??line=<?php echo $_GET['line'];?>" method="get" id="transport_form">
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
    </form>

<?php 
  $query2 = "SELECT * FROM Type_Location";
	$result2 = mysqli_query($dbcon, $query2);
?>
    <div id="Category" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Find locations from categories</h3>
      <div class="w3-row-padding" style="margin:0 -16px;">
      <div class="w3-half">
        <form action="listcatagory.php??catagory=<?php echo $_GET['catagory'];?>" method="get" id="form2">
      <div class="form-group">
        <label for="sel1">Select Category:</label>
        <select class="form-control" id="catagory" name="catagory">
              <option>-------Select-------</option>
              <?php
					    while($row2 = mysqli_fetch_array($result2, MYSQLI_NUM)){
					       echo "<option value='$row2[0]'>$row2[1]</option>";
					      }
					    ?>
            </select>
      </div>
      </div>
      </div>
      <p><input type="submit" value="Search" class="w3-button w3-dark-grey"></p>
      </form>
    </div>
  </div>
</header>





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
