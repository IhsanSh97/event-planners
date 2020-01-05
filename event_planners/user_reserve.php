<?php
/*require("includes/connect.php");
session_start();*/
include("includes/public_header.php");

	if(!isset($_SESSION['user_id'])){
		echo '<script>window.top.location="user_login.php"</script>';
	}
	else if(isset($_POST['submit'])){
		
		$date = $_POST['date'];
		$time = $_POST['time'];
		
		$q = "SELECT * FROM reservation";
		$rslt = mysqli_query($conn, $q);
		
		while($row = mysqli_fetch_assoc($rslt)){
			
			if($date != $row['r_date'] && $time != $row['r_time']){
			
				$query = "INSERT INTO reservation(vs_serial, user_id, r_date, r_time) VALUE('{$_GET['vs_serial']}', '{$_SESSION['user_id']}', '$date', '$time')";

				echo $query;
				die;

				if(mysqli_query($conn, $query)){

					$last_id = mysqli_insert_id($conn);
					/*echo $last_id;
					die;*/
					echo '<script>window.top.location="terms.php?last_id=mysqli_insert_id($conn)"</script>';
				}
				
			}else{
				$msg = "This time is already reserved on this day, please select another date or time.";
				}
				
		}
		

				
		
		
	}

/**/
	
		

?>

<section class="akame-contact-area bg-gray section-padding-80">
        <div class="container">
            <div class="row-fluid">
				 <!-- Form -->
                    <form action="#" method="post" class="akame-form border-0 p-0 col-lg-6 offset-lg-3" enctype="multipart/form-data">
                        <div class="row-fluid justify-content-center">
							<div class="breadcrumb-content">
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<h5>
											<li class="breadcrumb-item">Make an appointment</li>
											<li class="breadcrumb-item active" aria-current="page"><?php echo $_GET['vs_name'] ?></li>
										</h5>
									</ol>
								</nav>
							</div>
							<?php
								if(isset($msg)){
									echo "<div class='alert alert-danger'>$msg</div>";
								}
							?> 
							<h5>Date: <input name="date" class="form-control mb-30" type="date"></h5>
							<h5>Time: <input name="time" class="form-control mb-30" type="time"></h5>
							<div class="col-12 text-center">
                             <button type="submit" name="submit" class="btn akame-btn btn-3 mt-15 active">Submit</button>
                            </div>
						</div>
                    </form>
			</div>
		</div>
</section>
 

<?php include("includes/public_footer.php"); ?>