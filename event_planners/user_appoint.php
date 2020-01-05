<?php

include("includes/public_header.php");

if(!isset($_SESSION['user_id'])){
	echo '<script>window.top.location="user_login.php"</script>';
}

?>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Appintments</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table class="table table-bordered">
                  <thead>                  
                    <tr>
					  <!-- appointment serial -->
                      <th style="width: 10px">#</th>
						
                      <th>Vendor</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php

						  $query  = "SELECT * FROM reservation INNER JOIN vendor_service ON reservation.vs_serial = vendor_service.vs_serial WHERE user_id = {$_SESSION['user_id']}";
						  $result = mysqli_query($conn, $query);

						  while($row = mysqli_fetch_assoc($result)){
							echo "<tr>
									<td>{$row['serial']}</td>
									<td>{$row['vs_name']}</td>
									<td>{$row['r_date']}</td>
									<td>{$row['r_time']}</td>
									<td width='40px'><a href='delete_appoint.php?serial={$row['serial']}' class='btn btn-block bg-danger' style='color:white;'>Delete</a></td>
								  </tr>";
						  }
					  
					?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
				
            </div>
            <!-- /.card -->
			</div>
		</div>
	</div>
</section>
			  
<?php include("includes/public_footer.php"); ?>