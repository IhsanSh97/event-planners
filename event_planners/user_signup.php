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
		
		$img      = $_FILES['img']['name'];
		$tmp_name = $_FILES['img']['tmp_name'];
		$path     = "upload/".$img;
		
		move_uploaded_file($tmp_name, $path);
		
		$slct = "SELECT * FROM user";
		
		$rslt = mysqli_query($conn, $slct);
		
		while($ftch = mysqli_fetch_assoc($rslt)){
			
			if($email != $ftch['user_email']){
				
				$query = "INSERT INTO user(user_name, user_email, user_password, phone, img) VALUES('$name', '$email', '$password', '$phone', '$img')";

				$query2 = "SELECT * FROM user";

				while($row = mysqli_fetch_assoc(mysqli_query($conn, $query2))){

					if($row['user_email'] == $email){
						$_SESSION['user_id']   = $row['user_id'];
						$_SESSION['user_name'] = $row['user_name'];
						echo '<script>window.top.location="index.php"</script>';
					}
					else{
						$msg = "This email is already registered";
					}
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
