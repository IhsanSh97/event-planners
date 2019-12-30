<?php

if(isset($_SESSION['user_id'])){
	
include("includes/public_header.php");	
	if(isset($_POST['submit'])){
		
		$old_pass    = $_POST['old_pass'];
		$new_pass = $_POST['new_pass'];
		$conf_pass = $_POST['conf_pass'];
		
		if(!empty($old_pass) && !empty($new_pass) && $new_pass == $conf_pass){
			
			$slct = "SELECT user_password FROM user WHERE user_id = '{$_SESSION['user_id']}'";
			$rslt = mysqli_query($conn, $slct);
			$row  = mysqli_fetch_assoc($rslt);

			if($row['user_password'] == $old_pass){
				$query = "UPDATE user SET user_password = '$new_pass' WHERE user_id = '{$_SESSION['user_id']}'";
				mysqli_query($conn, $query);
				$scs   = "Your password has been changed successfully!";
			}
			else{
				$msg = "Password is incorrect!";
			}
		}
		
	}
}
else{
	echo '<script>window.top.location="user_signup.php"</script>';
	exit();
}

?>
<section class="akame-contact-area bg-gray section-padding-80">
        <div class="container">
            <div class="row-fluid">
				 <!-- Form -->
                    <form action="#" method="post" class="akame-form border-0 p-0 col-lg-6 offset-lg-3" enctype="multipart/form-data">
                        <div class="row-fluid justify-content-center">
							<h3 class="text-center mb-30">Change Password</h3>
							<?php
								if(isset($msg)){
									echo "<div class='alert alert-danger'>$msg</div>";
								}
								else if(isset($scs))
									echo "<div class='alert alert-success'>$scs</div>";
							?> 
                            <div class="col-lg-12">
								<input type="password" name="old_pass" class="form-control mb-30" placeholder="Old Password" required>
								<input type="password" name="new_pass" class="form-control mb-30" placeholder="New Password" required>
								<input type="password" name="conf_pass" class="form-control mb-30" placeholder="Confirm Password" required>
							
                            <div class="col-12 text-center">
                                <button type="submit" name="submit" class="btn akame-btn btn-3 mt-15 active">Submit</button>
                            </div>
                        </div>
                    </form>
			</div>
		</div>
</section>
<?php include("includes/public_footer.php") ?>    
