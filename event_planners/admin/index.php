<?php include("../includes/admin_header.php"); 

//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		$email    = $_POST['admin_email'];
		$password = $_POST['admin_password'];
		$admin_name = $_POST['admin_name'];
		
		$query 	= "INSERT INTO admin(admin_email, admin_password, admin_name) values('$email', '$password', '$admin_name')";
		
		//perform query
		mysqli_query($conn, $query);
		echo '<script>window.top.location="index.php"</script>';
		exit();
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
                <h3 class="card-title">New Admin</h3>
              </div>
			<form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" name="admin_email" id="exampleInputEmail1" placeholder="Enter email">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="admin_password" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" class="form-control" name="admin_name" id="exampleInputPassword1" placeholder="Enter Name">
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
                <h3 class="card-title">View Admin</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Email</th>
                      <th>Name</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php
							$query  = "SELECT * FROM admin";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
								echo "<tr>";
								echo "<td>{$row['admin_id']}</td>";
								echo "<td>{$row['admin_email']}</td>";
								echo "<td>{$row['admin_name']}</td>";
								echo "<td><a href='edit_admin.php?admin_id={$row['admin_id']}' class='btn btn-block bg-gradient-warning'>Edit</a></td>";
								echo "<td><a href = 'delete_admin.php?admin_id={$row['admin_id']}' class='btn btn-block bg-gradient-danger'>Delete</a></td>";
								echo "</tr>";
							}
						?>
                  </tbody>
                </table>
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