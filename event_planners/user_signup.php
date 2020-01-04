<?php

/*session_start();
include("includes/connect.php");
echo "<pre>";
print_r($_SESSION);
die();*/

include("includes/public_header.php");

	if(isset($_POST['submit'])){
		
		$name     = $_POST['name'];
		$email    = $_POST['email'];
		$phone    = $_POST['phone'];
		$password = $_POST['password'];
		$conf_password = $_POST['conf_password'];
		
		$img      = $_FILES['img']['name'];
		$tmp_name = $_FILES['img']['tmp_name'];
		$path     = "upload/".$img;
		
		move_uploaded_file($tmp_name, $path);
		

			
			if($password == $conf_password){
				
				$query = "INSERT INTO user(user_name, user_email, user_password, phone, img) VALUES('$name', '$email', '$password', '$phone', '$img')";
				
				mysqli_query($conn, $query);

				$query2 = "SELECT * FROM user";
				$result2 = mysqli_query($conn, $query2);

				$row1    = mysqli_fetch_assoc($result2);

				if(mysqli_query($conn, $query)){
					
					$last_id = mysqli_insert_id($conn);
					$_SESSION['user_id']   = $last_id;
					
					if(isset($_SESSION['user_id'])){
						$_SESSION['user_name'] = $row1['user_name'];
					}
					
					echo '<script>window.top.location="index.php"</script>';
					exit();
				}
				else{
					$msg = "This email is already registered.";
				}

			}
			else{
					$msg = "Please check your password!";
				}
				
	}

?>   

<section class="akame-contact-area bg-gray section-padding-80">
        <div class="container">
            <div class="row-fluid">
				 <!-- Form -->
                    <form action="#" method="post" class="akame-form border-0 p-0 col-lg-6 offset-lg-3" enctype="multipart/form-data">
                        <div class="row-fluid justify-content-center">
							<h3 class="text-center mb-30">User Register</h3>
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
								<p style="color: black;">Already have an account? <a href="user_login.php" style="color: #bca858; ">Login here</a></p>
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
