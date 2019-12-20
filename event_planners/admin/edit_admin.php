<?php include("../includes/admin_header.php"); 

//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		$email    = $_POST['admin_email'];
		$password = $_POST['admin_password'];
		$admin_name = $_POST['admin_name'];
		
		$query 	= "UPDATE admin SET admin_email = '$email', admin_password = '$password', admin_name = '$admin_name' WHERE admin_id = {$_GET['admin_id']}";
		
		mysqli_query($conn, $query);
		
		//perform query
		
		
		
		echo '<script>window.top.location="index.php"</script>';
		exit();
	}

		$query  = "SELECT * FROM admin WHERE admin_id = {$_GET['admin_id']}";
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
                <h3 class="card-title">Edit Admin</h3>
              </div>
			<form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="admin_email" id="exampleInputEmail1" placeholder="Enter email" value="<?php echo $row['admin_email'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="admin_password" id="exampleInputPassword1" placeholder="Password" value="<?php echo $row['admin_password'] ?>">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" name="admin_name" id="exampleInputPassword1" placeholder="Enter Name" value="<?php echo $row['admin_name'] ?>">
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Update</button>
                </div>
              </form>
		  </div>
		 
			<div class="card">
             
              <!-- /.card-header -->
              <div class="card-body p-0">
               
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