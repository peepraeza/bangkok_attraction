<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Change dropdown options based on another dropdown dynamically using ajax || Mitrajit's Tech Blog</title>
<style>
span { clear:both; display:block; margin-bottom:30px; }
span a { font-weight:bold; color:#0099FF; }
label { display:block; clear:both; margin-top:20px; margin-bottom:3px;}
select { width:200px; }
#country { margin-right:30px; }
</style>

<script type="text/javascript" src="jquery.min.js"></script>

</head>
<?php 
require 'connectdb.php';
?>

<body>
	<span>Read the full article -- <a href="http://www.mitrajit.com/populate-dropdown-list-based-selection-another-dropdown-list-using-ajax/" target="_blank">Populate a dropdown list based on selection another dropdown option using ajax</a> in <a href="http://www.mitrajit.com/">Mitrajit's Tech Blog</a></span>
	<div class="">
		<label>Country :</label>
		<select name="transport" id="transport">
			<option value=''>------- Select --------</option>
			<?php 
			$sql = "SELECT * FROM Type_Transport";
			$result = mysqli_query($dbcon, $sql);
			if(mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_object($result)) {
					echo "<option value='".$row->type_id."'>".$row->type_transport."</option>";
				}
			}
			?>
		</select>
		
		<label>State :</label>
		<select name="line" id="line"><option>------- Select --------</option></select>
	</div>
	
</body>
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
</html>
