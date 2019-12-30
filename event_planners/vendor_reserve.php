<?php
include("includes/public_header.php");

	if(!isset($_SESSION['user_id']) && !isset($_SESSION['v_id'])){
		echo '<script>window.top.location="user_signup.php"</script>';
	}
	else{
		print_r($_SESSION);
	}
		

?>
<?php include("includes/public_footer.php"); ?>