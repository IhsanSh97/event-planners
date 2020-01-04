<?php include("../includes/admin_header.php"); 

//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		//$serial = $_POST['vs_serial'];
		
		/*
		$slct  = "SELECT * FROM vendor_service";
		$rslt = mysqli_query($conn, $slct);
		$row = mysqli_fetch_assoc($rslt);
		$vs_name = $row['vs_name'];
		*/
		$vs = explode("-",$_POST['vs_serial']);
					
			$query 	= "INSERT INTO best_vendor(vs_serial, vs_name) values('$vs[0]', '$vs[1]')";
		
			/*echo $query;
			die;*/


			//perform query
			mysqli_query($conn, $query);
			echo '<script>window.top.location="best_vendor.php"</script>';
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
                <h3 class="card-title">Best Vendor</h3>
              </div>
			<form role="form" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Select Vendor</label>
					  <div class="alert alert-warning">You can select the vendor only once.</div>
					  <select class='form-control' name='vs_serial'>
						  <option selected disabled value=''>Select Vendor</option>
                    <?php
					
					  	$query  = "SELECT * FROM vendor_service";
						$result = mysqli_query($conn, $query);
						  
						while($row = mysqli_fetch_assoc($result)){
							echo "<option value='{$row['vs_serial']}-{$row['vs_name']}'>{$row['vs_name']}</option>";
						}
					  
					?>
					</select>
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
                <h3 class="card-title">Best Vendor</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Vendor</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php
							$query1  = "SELECT * FROM best_vendor";
							$result1 = mysqli_query($conn, $query1);
							while($row1 = mysqli_fetch_assoc($result1)){
								echo "<tr>";
								echo "<td>{$row1['vs_serial']}</td>";
								echo "<td>{$row1['vs_name']}</td>";
								echo "<td><a href='edit_vendor.php?vs_serial={$row1['vs_serial']}' class='btn btn-block bg-gradient-warning'>Edit</a></td>";
								echo "<td><a href = 'delete_vendor.php?vs_serial={$row1['vs_serial']}' class='btn btn-block bg-gradient-danger'>Delete</a></td>";
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