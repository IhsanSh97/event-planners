<?php

require("includes/connect.php");

$query = "DELETE FROM reservation WHERE serial = {$_GET['serial']}";
mysqli_query($conn, $query);


	echo '<script>window.top.location="vendor_reserve.php"</script>';
	exit();



?>