<?php
include("includes/public_header.php");

	if(isset($_POST['submit'])){
		
		$name     = $_POST['name'];
		$email    = $_POST['email'];
		$phone    = $_POST['phone'];
		$password = $_POST['password'];
		$conf_password = $_POST['conf_password'];
		$cat      = $_POST['cat'];
				
		$slct = "SELECT * FROM vendor";
		
		$rslt = mysqli_query($conn, $slct);
		
		while($ftch = mysqli_fetch_assoc($rslt)){
			
			if($email != $ftch['v_email'] && $password == $conf_password){
				
				$query1 = "INSERT INTO vendor(v_name, v_email, v_password, phone) VALUES('$name', '$email', '$password', '$phone')";

				/*echo $query1;
				die;*/
				
				$query2 = "SELECT * FROM vendor";
				$result1 = mysqli_query($conn, $query2);

				$row1    = mysqli_fetch_assoc($result1);

				if($row1['v_id']){
					$_SESSION['v_id']   = $row1['v_id'];
					$_SESSION['v_name'] = $row1['v_name'];
					
					echo '<script>window.top.location="vendor_form.php"</script>';
					exit();
				}
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
							<h3 class="text-center mb-30">Vendor Register</h3>
							<?php
								if(isset($msg)){
									echo "<div class='alert alert-danger'>$msg</div>";
								}
							?> 
                            <div class="col-lg-12">
                                <input type="text" name="name" class="form-control mb-30" placeholder="Your Name" required>
                                <input type="email" name="email" class="form-control mb-30" placeholder="Email" required>
								<input type="password" name="password" class="form-control mb-30" placeholder="Password" required>
								<input type="password" name="conf_password" class="form-control mb-30" placeholder="Confirm Password" required>
                                <input type="text" name="phone" class="form-control mb-30" placeholder="Phone Number" required>
								<input type="file" name="img" class="mb-30" required>
								<p style="color: black;">Already have an account? <a href="vendor_login.php" style="color: #bca858; ">Login here</a></p>
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
