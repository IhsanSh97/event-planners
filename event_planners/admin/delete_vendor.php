<?php
include("../includes/connect.php");

	$query = "DELETE FROM best_vendor WHERE vs_serial = {$_GET['vs_serial']}";
	mysqli_query($conn, $query);

	echo '<script>window.top.location="best_vendor.php"</script>';
?>