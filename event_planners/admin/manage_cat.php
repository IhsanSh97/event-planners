<?php 
include("../includes/admin_header.php"); 

//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		
		//fetch data from web form
		$cat       = $_POST['category'];
		
		/*echo "<pre>"; print_r($_FILES);die;*/
		// get data from file
		$img       = $_FILES['img']['name'];
		$temp_name = $_FILES['img']['tmp_name'];
		$path      = "upload/";
		
		
		move_uploaded_file($temp_name, $path.$img);

		
		$query 	 = "INSERT INTO service(category,img) values('$cat', '$img')";
		
		//perform query
		mysqli_query($conn, $query);
	
		echo '<script>window.top.location="manage_cat.php"</script>';
		/*exit();*/

	}


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
                    <input type="text" class="form-control" name="category" id="exampleInputEmail1" placeholder="Enter category name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Image</label><br>
                    <input type="file" name="img" id="exampleInputPassword1">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
		  </div>
		 
			<div class="card">
              <div class="card-header">
                <h3 class="card-title">View Category</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Category</th>
                      <th>Image</th>
                      <th>View</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php
							$query2  = "SELECT * FROM service";
							$result = mysqli_query($conn, $query2);
							while($row = mysqli_fetch_assoc($result)){
								echo "<tr>";
								echo "<td>{$row['service_id']}</td>";
								echo "<td>{$row['category']}</td>";
								echo "<td><img width='100px' src='upload/{$row['img']}'/></td>";
								echo "<td><a href='view_service.php?service_id={$row['service_id']}' class='btn btn-block bg-gradient-success'>View</a></td>";
								echo "<td><a href='edit_category.php?service_id={$row['service_id']}' class='btn btn-block bg-gradient-warning'>Edit</a></td>";
								echo "<td><a href = 'delete_category.php?service_id={$row['service_id']}' class='btn btn-block bg-gradient-danger'>Delete</a></td>";
								echo "</tr>";
							}
						?>
                  </tbody>
                </table>
				  <?php
				  echo "<a href='best_vendor.php' class='btn btn-block btn-info btn-lg'>Best Vendor</a>";
					  ?>
              </div>
              <!-- /.card-body -->
            </div>
				</div>
		 </div>
	</section>
    <!-- /.content -->
  	</div>
  </div>
  <!-- /.content-wrapper -->
<?php include("../includes/admin_footer.php"); ?>  