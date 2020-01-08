<?php
/*
require("includes/connect.php");
session_start();
*/include("includes/public_header.php");

	if(!isset($_SESSION['v_id'])){
		echo '<script>window.top.location="vendor_login.php"</script>';
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
						
                      <th>Name</th>
                      <th>Phone</th>
                      <th>Date</th>
                      <th>Time</th>
                      <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
					<?php
					  	  $q = "SELECT vs_serial FROM vendor_service WHERE v_id = {$_SESSION['v_id']}";
					  	  $rslt = mysqli_query($conn, $q);
					      $r    =  mysqli_fetch_assoc($rslt);
						  $query  = "SELECT * FROM reservation RIGHT JOIN user ON reservation.user_id = user.user_id WHERE vs_serial = {$r['vs_serial']}";
					  /*echo $query;
					  die;*/
						  $result = mysqli_query($conn, $query);

						  while($row = mysqli_fetch_assoc($result)){
							echo "<tr>
									<td>{$row['serial']}</td>
									<td>{$row['user_name']}</td>
									<td>{$row['phone']}</td>
									<td>{$row['r_date']}</td>
									<td>{$row['r_time']}</td>
									<td width='40px'><a href='delete_reserve.php?serial={$row['serial']}' class='btn btn-block bg-danger' style='color:white;'>Delete</a></td>
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
