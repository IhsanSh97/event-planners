<?php
include("includes/public_header.php");

	if(!isset($_SESSION['user_id']) || !isset($_SESSION['v_id'])){
		header("location:reg/user_signup");
	}

?>
<?php
include("includes/public_footer.php");

?>