<?php

include("../includes/connect.php");
session_start();

	if(isset($_POST['submit'])){
		
		$name     = $_POST['name'];
		$email    = $_POST['email'];
		$phone    = $_POST['phone'];
		$password = $_POST['password'];
		
		$img      = $_FILES['img']['name'];
		$tmp_name = $_FILES['img']['tmp_name'];
		$path     = "../upload/".$img;
		
		move_uploaded_file($tmp_name, $path);
		
		$slct = "SELECT * FROM user";
		
		$rslt = mysqli_query($conn, $slct);
		
		while($ftch = mysqli_fetch_assoc($rslt)){
			
			if($email != $ftch['user_email']){
				
				$query = "INSERT INTO user(user_name, user_email, user_password, phone, img) VALUES('$name', '$email', '$password', '$phone', '$img')";

				$result = mysqli_query($conn, $query);

				$row    = mysqli_fetch_assoc($result);

				if($row['user_id']){
					$_SESSION['user_id'] = $row['user_id'];
					$_SESSION['user_name'] = $row['user_name'];
				}
			}
		}

		
		echo $_SESSION['user_id'];
		echo "<br>";
		echo $_SESSION['user_name'];
		die;
		
		header("location:../index.php");
	}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mystyle.css">
</head>
<body>
    <div class="main">

        <div class="container">
            <form method="POST" class="appointment-form" id="appointment-form" enctype="multipart/form-data">
                <h2>sign up</h2>
                <div class="form-group-1">
                    <input type="text" name="name" id="name" placeholder="Your Name" required />
                    <input type="email" name="email" id="email" placeholder="Email" required />
                    <input type="password" name="password" id="email" placeholder="Password" required />
                    <input type="text" name="phone" id="phone_number" placeholder="Phone number" required />
                    <input type="file" name="img" id="phone_number" required />
                    <!--<div class="select-list">
                        <select name="course_type" id="course_type">
                            <option slected value="">Course Type</option>
                            <option value="society">Society</option>
                            <option value="language">Language</option>
                        </select>
                    </div>-->
                </div>
                <!--<div class="form-group-2">
                    <h3>How would you like to bo located ?</h3>
                    <div class="select-list">
                        <select name="confirm_type" id="confirm_type">
                            <option seleected value="">By phone</option>
                            <option value="by_email">By email</option>
                        </select>
                    </div>
                    <div class="select-list">
                        <select name="hour_appointment" id="hour_appointment">
                            <option seleected value="">Hours : 8am 10pm</option>
                            <option value="9h-11h">Hours : 9am 11pm</option>
                        </select>
                    </div>
                </div>
                <div class="form-check">
                    <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                    <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree to the  <a href="#" class="term-service">Terms and Conditions</a></label>
                </div>-->
                <div class="form-submit">
                    <input type="submit" name="submit" id="submit" class="submit" value="Sign Up" />
                </div>
            </form>
        </div>

    </div>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>