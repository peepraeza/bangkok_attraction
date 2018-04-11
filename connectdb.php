<?php 
	$dbcon =  mysqli_connect('localhost', 'peepraeza', '', 'bangkok_attraction') or die('not connect database'.mysqli_connect_error());
	mysqli_set_charset($dbcon, 'utf8');

