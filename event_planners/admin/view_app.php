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
                <h3 class="card-title">Appointments</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-condensed">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Service ID</th>
                      <th>User ID</th>
                      <th>Date</th>
                      <th>Time</th>
                    </tr>
                  </thead>
                  <tbody>
					  <?php
							$query  = "SELECT * FROM reservation";
							$result = mysqli_query($conn, $query);
							while($row = mysqli_fetch_assoc($result)){
								echo "<tr>";
								echo "<td>{$row['serial']}</td>";
								echo "<td>{$row['vs_serial']}</td>";
								echo "<td>{$row['user_id']}</td>";
								echo "<td>{$row['r_date']}</td>";
								echo "<td>{$row['r_time']}</td>";
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
<?php include("../includes/admin_footer.php"); ?>  <?php?>