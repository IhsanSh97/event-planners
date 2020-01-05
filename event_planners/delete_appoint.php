<?php

require("includes/connect.php");

$query = "DELETE FROM reservation WHERE serial = {$_GET['serial']}";
mysqli_query($conn, $query);

if(isset($_SESSION['user_id'])){
	echo '<script>window.top.location="user_appoint.php"</script>';
	exit();
}
else if(isset($_SESSION['v_id'])){
	echo '<script>window.top.location="vendor_reserve.php"</script>';
	exit();
}


?>