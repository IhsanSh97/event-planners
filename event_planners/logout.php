<?php
session_start();

	/*unset($_SESSION['user_id']);
	unset($_SESSION['v_id']);*/

	session_destroy();

	header("location:index.php");

?>