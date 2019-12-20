<?php 
include("../includes/admin_header.php"); 

//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		$cat         = $_POST['category'];
		
		/*echo "<pre>"; print_r($_FILES);die;*/
		// get data from file
		$img       = $_FILES['img']['name'];
		$temp_name = $_FILES['img']['tmp_name'];
		$path      = "upload/";
		
		
		move_uploaded_file($temp_name, $path.$img);
		
		if($err == 0){
			$query 	= "UPDATE service SET category = '$cat', img = '$img' WHERE service_id = {$_GET['service_id']}";
		}
		else{
			$query 	= "UPDATE service SET category = '$cat' WHERE service_id = {$_GET['service_id']}";
		}
		
		
		
		//perform query
		mysqli_query($conn, $query);
	
		echo '<script>window.top.location="manage_cat.php"</script>';
		/*exit();*/

	}
		$query  = "SELECT * FROM service WHERE service_id = {$_GET['service_id']}";
		$result = mysqli_query($conn, $query);
		$row    = mysqli_fetch_assoc($result);


?>  

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
			<div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">New Category</h3>
              </div>
			<form method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <input type="text" class="form-control" name="category" value="<?php echo $row['category'];?>" id="exampleInputEmail1" placeholder="Enter category name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label>
                    <input type="file" class="form-control" name="img" value="<?php echo $row['img'];?>" id="exampleInputPassword1">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
		  </div>
		 
			
				</div>
		 </div>
	</section>
    <!-- /.content -->
  	</div>
  </div>
  <!-- /.content-wrapper -->
<?php include("../includes/admin_footer.php"); ?>  