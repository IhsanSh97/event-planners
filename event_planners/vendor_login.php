<?php
include("includes/public_header.php");

	if(isset($_POST['submit'])){		
		$email    = $_POST['email'];
		$password = $_POST['password'];
		
		if(!empty($email) && !empty($password)){
			
			$slct = "SELECT * FROM vendor WHERE v_email = '$email' AND v_password = '$password'";
			$rslt = mysqli_query($conn, $slct);
			$row  = mysqli_fetch_assoc($rslt);
			
			if($row['v_id']){
				$_SESSION['v_id']   = $row['v_id'];
				$_SESSION['v_name'] = $row['v_name'];
				echo '<script>window.top.location="index.php"</script>';
			}
			else{
				$msg = "Your email or password is incorrect";
			}
					
		}
	}

?>
<section class="akame-contact-area bg-gray section-padding-80">
        <div class="container">
            <div class="row-fluid">
				 <!-- Form -->
                    <form action="#" method="post" class="akame-form border-0 p-0 col-lg-6 offset-lg-3" enctype="multipart/form-data">
                        <div class="row-fluid justify-content-center">
							<h3 class="text-center mb-30">Vendor Login</h3>
							<?php
								if(isset($msg)){
									echo "<div class='alert alert-danger'>$msg</div>";
								}
							?> 
                            <div class="col-lg-12">
                                <input type="email" name="email" class="form-control mb-30" placeholder="Email" required>
								<input type="password" name="password" class="form-control mb-30" placeholder="Password" required>
								<p style="color: black;">Don't have an account? <a href="vendor_signup.php" style="color: #bca858; ">Regist here</a></p>
							</div>
							
                            <div class="col-12 text-center">
                                <button type="submit" name="submit" class="btn akame-btn btn-3 mt-15 active">Submit</button>
                            </div>
                        </div>
                    </form>
			</div>
		</div>
</section>

<?php include("includes/public_footer.php") ?>    
