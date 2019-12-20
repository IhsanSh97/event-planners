<?php

	include("../includes/connect.php");

	$query = "DELETE FROM admin WHERE admin_id = {$_GET['admin_id']}";

	mysqli_query($conn, $query);

	header("location:index.php");

?>