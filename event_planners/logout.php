<?php
session_start();

	unset($_SESSION['user_id']);
	unset($_SESSION['v_id']);

	header("location:index.php");

?>