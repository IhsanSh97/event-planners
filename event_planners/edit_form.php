<?php 

include_once("includes/public_header.php");

/*require("includes/connect.php");
session_start();*/

	if(isset($_POST['submit']) && isset($_SESSION['v_id'])){
		
		$vs_name  = $_POST['vs_name'];
		$cat      = $_POST['cat'];
		
		$img      = $_FILES['main_img']['name'];
		$tmp_name = $_FILES['main_img']['tmp_name'];
		$err      = $_FILES['main_img']['error'];
		$path     = "upload/";
		
		move_uploaded_file($tmp_name, $path.$img);
		
		
		
			if($err == 0){
				$q = "UPDATE vendor_service SET vs_name = '$vs_name', service_id = '$cat', img = '$img' WHERE v_id = {$_SESSION['v_id']}";
			}
			else{
				$q = "UPDATE vendor_service SET vs_name = '$vs_name', service_id = '$cat' WHERE v_id = {$_SESSION['v_id']}";
			}


			mysqli_query($conn, $q);
		
		$desc1  = $_POST['desc1'];
		$desc2  = $_POST['desc2'];
		$desc3  = $_POST['desc3'];
		
		$img1      = $_FILES['vs_img1']['name'];
		$tmp_name1 = $_FILES['vs_img1']['tmp_name'];
		$err1      = $_FILES['vs_img1']['error'];
		$path1     = "upload/";
		
		move_uploaded_file($tmp_name1, $path1.$img1);
		
		
		$img2      = $_FILES['vs_img2']['name'];
		$tmp_name2 = $_FILES['vs_img2']['tmp_name'];
		$err2      = $_FILES['vs_img2']['error'];
		$path2     = "upload/";
		
		move_uploaded_file($tmp_name2, $path2.$img2);
		
		$img3      = $_FILES['vs_img3']['name'];
		$tmp_name3 = $_FILES['vs_img3']['tmp_name'];
		$err3      = $_FILES['vs_img3']['error'];
		$path3     = "upload/";
		
		/*$error = array($err1, $err2, $err3);*/
		
		move_uploaded_file($tmp_name3, $path3.$img3);
		
		/*while($error[0] == 0){
			$qu = "UPDATE vs_img SET img1 = '$img1' WHERE vs_serial = {$row['vs_serial']}";			
			
		}*/
		
		$slct = "SELECT * FROM vendor_service WHERE v_id = {$_SESSION['v_id']}";
		$results = mysqli_query($conn, $slct);
		/*$rows = mysqli_fetch_assoc($results);
		echo "<pre>";
		print_r($results);
		print_r($rows);
		die;*/
		
		while($rows = mysqli_fetch_assoc($results)){
		
			if($err1 == 0){
					$qu1 = "UPDATE vs_img SET img1 = '$img1' WHERE vs_serial = {$rows['vs_serial']}";
					mysqli_query($conn, $qu1);
				}
			if($err2 == 0){
					$qu2 = "UPDATE vs_img SET img2 = '$img2' WHERE vs_serial = {$rows['vs_serial']}";
					mysqli_query($conn, $qu2);
				}
			if($err3 == 0){
					$qu3 = "UPDATE vs_img SET img3 = '$img3' WHERE vs_serial = {$rows['vs_serial']}";
					mysqli_query($conn, $qu3);	
				}

			$qu = "UPDATE vs_img SET desc1 = '$desc1', desc2 = '$desc2', desc3 = '$desc3' WHERE vs_serial = {$rows['vs_serial']}";

			mysqli_query($conn, $qu);
		}
		/*echo $q;
		echo "<br>";
		echo $qu;
		echo "<br>";
		echo $qu1;
		echo "<br>";
		echo $qu2;
		echo "<br>";
		echo $qu3;
		echo "<br>";
		die;*/
		
		
		
		echo '<script>window.top.location="edit_form.php"</script>';
		exit();
		
	}

	$query = "SELECT * FROM vendor_service WHERE v_id = {$_SESSION['v_id']}";
	$result = mysqli_query($conn, $query);
	$row = mysqli_fetch_assoc($result);
	
	$query2 = "SELECT * FROM vs_img WHERE vs_serial = {$row['vs_serial']}";
	$result2 = mysqli_query($conn, $query2);
	$row2 = mysqli_fetch_assoc($result2);


/*echo $query;
echo $query2;
		die;*/
?>    

<section class="akame-contact-area bg-gray section-padding-80">
        <div class="container">
            <div class="row-fluid">
				 <!-- Form -->
                    <form action="#" method="post" class="akame-form border-0 p-0" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-12">
                                <select name="cat" class="form-control mb-30">
									
									<?php
									echo "<option slected disabled value=''>Category</option>";
									$query1 = "SELECT * FROM service";
									$result1 = mysqli_query($conn, $query1);
									while($row1 = mysqli_fetch_assoc($result1)){
										if($row1['service_id'] == $row['service_id'])
											echo "<option selected value='{$row1['service_id']}'>{$row1['category']}</option>";
										else
											echo "<option value='{$row1['service_id']}'>{$row1['category']}</option>";
									}
									?>
								</select>
                            </div>
                            <div class="col-lg-6">
                                <input type="text" name="vs_name" class="form-control mb-30" placeholder="Market Name" value="<?php echo $row['vs_name'] ?>">
                            </div>
							<div class="col-6">
								<input type="file" name="main_img" class="mb-30">
							</div>
							<div class="alert alert-primary col-12">You need to make sure to put every image with its description.</div>
							<div class="col-lg-6">
                                <input type="text" name="desc1" class="form-control mb-30" placeholder="Image 1 Description" value="<?php echo $row2['desc1'] ?>">
                            </div>
							<div class="col-6">
								<input type="file" name="vs_img1" class="mb-30">
							</div>
							<div class="col-lg-6">
                                <input type="text" name="desc2" class="form-control mb-30" placeholder="Image 2 Description" value="<?php echo $row2['desc2'] ?>">
                            </div>
							<div class="col-6">
								<input type="file" name="vs_img2" class="mb-30">
							</div>
							<div class="col-lg-6">
                                <input type="text" name="desc3" class="form-control mb-30" placeholder="Image 3 Description" value="<?php echo $row2['desc3'] ?>">
                            </div>
							<div class="col-6">
								<input type="file" name="vs_img3" class="mb-30">
							</div>
                            <div class="col-12 text-center">
                                <button type="submit" name="submit" class="btn akame-btn btn-3 mt-15 active">Save</button>
                            </div>
                        </div>
                    </form>
			</div>
		</div>
</section>

<?php include_once("includes/public_footer.php") ?>    
