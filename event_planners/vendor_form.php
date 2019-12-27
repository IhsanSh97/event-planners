<?php 

include("includes/public_header.php"); 

	if(isset($_POST['submit']) && isset($_SESSION['v_id'])){
		
		$vs_name  = $_POST['vs_name'];
		$cat      = $_POST['cat'];
		
		$img      = $_FILES['main_img']['name'];
		$tmp_name = $_FILES['main_img']['tmp_name'];
		$path     = "upload/";
		$vid      = $_SESSION['v_id'];
		
		move_uploaded_file($tmp_name, $path.$img);
		$q = "INSERT INTO vendor_service(vs_name, service_id, v_id, img) VALUES('$vs_name', '$cat', '$vid', '$img')";
			
		if(mysqli_query($conn, $q))
		{
			$last_id = mysqli_insert_id($conn);
		}
		
		mysqli_query($conn, $q);
		
		$select = "SELECT * FROM vendor_service WHERE v_id = {$_SESSION['v_id']}";
		
		$desc1  = $_POST['desc1'];
		$desc2  = $_POST['desc2'];
		$desc3  = $_POST['desc3'];
		
		$img1      = $_FILES['vs_img1']['name'];
		$tmp_name1 = $_FILES['vs_img1']['tmp_name'];
		$path1     = "upload/";
		
		move_uploaded_file($tmp_name1, $path1.$img1);
		
		$img2      = $_FILES['vs_img2']['name'];
		$tmp_name2 = $_FILES['vs_img2']['tmp_name'];
		$path2     = "upload/";
		
		move_uploaded_file($tmp_name2, $path2.$img2);
		
		$img3      = $_FILES['vs_img3']['name'];
		$tmp_name3 = $_FILES['vs_img3']['tmp_name'];
		$path3     = "upload/";
		
		move_uploaded_file($tmp_name3, $path3.$img3);
		
		$qu = "INSERT INTO vs_img(img1, img2, img3, desc1, desc2, desc3, vs_serial) VALUES('$img1', '$img2', '$img3', '$desc1', '$desc2', '$desc3', '$last_id')";
		
		/*echo $q;
		echo $qu;
		die;*/
		
		mysqli_query($conn, $qu);
		
		echo '<script>window.top.location="vendor_form.php"</script>';
		exit();
		
	}


?>    

<section class="akame-contact-area bg-gray section-padding-80">
        <div class="container">
            <div class="row-fluid">
				 <!-- Form -->
                    <form action="#" method="post" class="akame-form border-0 p-0" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <select name="cat" class="form-control mb-30" required>
									
									<?php
									echo "<option slected disabled value=''>Category</option>";
									$query = "SELECT * FROM service";
									$result = mysqli_query($conn, $query);
									while($row = mysqli_fetch_assoc($result)){
										echo "<option value='{$row['service_id']}'>{$row['category']}</option>";
									}
									?>
								</select>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="vs_name" class="form-control mb-30" placeholder="Market Name" required>
                            </div>
							<div class="col-6">
								<input type="file" name="main_img" class="mb-30" required>
							</div>
							<div class="alert alert-primary col-12">You need to make sure to put every image with its description.</div>
							<div class="col-lg-6">
                                <input type="text" name="desc1" class="form-control mb-30" placeholder="Image 1 Description" required>
                            </div>
							<div class="col-6">
								<input type="file" name="vs_img1" class="mb-30" required>
							</div>
							<div class="col-lg-6">
                                <input type="text" name="desc2" class="form-control mb-30" placeholder="Image 2 Description" required>
                            </div>
							<div class="col-6">
								<input type="file" name="vs_img2" class="mb-30" required>
							</div>
							<div class="col-lg-6">
                                <input type="text" name="desc3" class="form-control mb-30" placeholder="Image 3 Description" required>
                            </div>
							<div class="col-6">
								<input type="file" name="vs_img3" class="mb-30" required>
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
