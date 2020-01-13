<?php include("../includes/admin_header.php"); 


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
			<div class="card">
              <div class="card-header">
                <h3 class="card-title">View Service</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
				  <?php
				  
				  	if(isset($msg)){
						echo "<div class='alert alert-success'>$msg</div>";
					}
					/*else if(isset($_GET['err'])){
						echo "<div class='alert alert-success'>{$_GET['err']}</div>";
					}
					else{
						  echo "";
					}*/
				  ?>
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Vendor ID</th>
                      <th>Name</th>
                      <th>Image</th>
                      <th>Make Best Vendor</th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php
							$query  = "SELECT * FROM vendor_service WHERE service_id = {$_GET['service_id']}";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
								echo "<tr>";
								echo "<td>{$row['vs_serial']}</td>";
								echo "<td>{$row['v_id']}</td>";
								echo "<td>{$row['vs_name']}</td>";
								echo "<td><img width='100px' src='../upload/{$row['img']}'/></td>";
								echo "<td><form method='post'><button name='best' class='btn btn-block bg-gradient-success'>Best Vendor</button></form></td>";
								
								if(isset($_POST['best'])){
									
									$query1 = "INSERT INTO best_vendor(vs_serial, vs_name) values('{$row['vs_serial']}', '{$row['vs_name']}')";
		
									//perform query
									mysqli_query($conn, $query1);

									$msg = "Best Vendor has been added successfully";
									
									echo "<script>window.top.location='view_service.php?service_id={$_GET['service_id']}'</script>";
									/*exit();*/
								}
								
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