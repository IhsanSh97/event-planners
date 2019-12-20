<?php

	include("../includes/connect.php");

	$sel    = "SELECT img FROM service WHERE service_id = {$_GET['service_id']}";
	

	$result = mysqli_query($conn, $sel);
	$row    = mysqli_fetch_assoc($result);

	unlink("upload/".$row['img']);
		
	$query  = "DELETE FROM service WHERE service_id = {$_GET['service_id']}";

	mysqli_query($conn, $query);


	header("location:manage_cat.php");

?>