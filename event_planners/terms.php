<?php
include("includes/public_header.php");


	if(!isset($_SESSION['user_id']) && !isset($_GET['last_id'])){
		echo '<script>window.top.location="user_signup.php"</script>';
	}
	

	$query = "SELECT * FROM reservation WHERE user_id = {$_SESSION['user_id']} AND serial = {$_GET['last_id']}";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);

		
		/*echo '<script>window.top.location="user_reserve.php"</script>';*/
		
	

/*require("includes/connect.php");
session_start();*/
	
		

?>

<div class="breadcumb_area bg-img" style="background-image: url(img/imgs/bg.jpg); height: 30pc; ">
     <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
				
					<div class="alert alert-success">
						<span>Your appointment has been successfully saved! Thank you for your trust!</span>
					</div>
				<span>Your appointment date is <?php echo $row['r_date'] ?></span><br>
				<span>Your appointment time is <?php echo $row['r_time'] ?></span><br>
					<div class="alert alert-warning" >
						<h5 class="alert-heading">Dear customer, please consider that:</h5>
						<span>If you don't confirm your appointment by calling the vendor or going to the shop it will be declined by the vendor.</span>
						<hr>
						<span>NOTE: You can find the vendor phone number on the service page.</span><br>
					</div>
				
				
			</div>
		</div>
	</div>
</div>
		
 

<?php include("includes/public_footer.php"); ?>