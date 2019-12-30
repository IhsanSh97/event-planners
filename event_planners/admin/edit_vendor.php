<?php include("../includes/admin_header.php"); 

//the action will start if the button is clicked
	if(isset($_POST['submit'])){
		//fetch data from web form
		$serial = $_POST['vs_serial'];
		
		$slct  = "SELECT * FROM vendor_service WHERE vs_serial = {$_GET['vs_serial']}";
		$rslt = mysqli_query($conn, $slct);
		$row = mysqli_fetch_assoc($rslt);
		$vs_name = $row['vs_name'];
		
		if(!empty($vs_name)){
		
			$query 	= "UPDATE best_vendor SET vs_serial = '$serial' , vs_name = '$vs_name'";

			/*echo $query;
			die;*/


			//perform query
			mysqli_query($conn, $query);
			echo '<script>window.top.location="best_vendor.php"</script>';
			exit();
		}
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
					  <select class='form-control' name='vs_serial'>
						  <option disabled value=''>Select Vendor</option>
                    <?php
					
					  	$query  = "SELECT * FROM vendor_service";
						$result = mysqli_query($conn, $query);
						  
						while($row = mysqli_fetch_assoc($result)){
							
							if($_GET['vs_serial'] == $row['vs_serial']){
								echo "<option selected value='{$row['vs_serial']}'>{$row['vs_name']}</option>";
							}
							else
								echo "<option value='{$row['vs_serial']}'>{$row['vs_name']}</option>";
						}
					  	echo "</select>";
																
					?>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Update</button>
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