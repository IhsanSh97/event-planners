<?php
include("includes/public_header.php");

	if(!isset($_SESSION['user_id']) || !isset($_SESSION['v_id'])){
		echo '<script>window.top.location="reg/user_signup.php"</script>';
	}

?>
<?php include("includes/public_footer.php"); ?>