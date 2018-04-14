<?php require 'connectdb.php'; ?>
<?php
if(isset($_POST['type_id'])) {
	$sql = "SELECT * FROM Transportation WHERE `transport_type`=".mysqli_real_escape_string($dbcon, $_POST['type_id']);
	$res = mysqli_query($dbcon, $sql);
	if(mysqli_num_rows($res) > 0) {
		while($row = mysqli_fetch_object($res)) {
			echo "<option value='".$row->transport_id."'>".$row->transport_line."</option>";
		}
	}
} else {
	header('location: ./');
}
?>
