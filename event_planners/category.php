<?php include("includes/public_header.php") ?>      
<!-- Breadcrumb Area Start -->
    <section class="breadcrumb-area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2>Vendors</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="icon_house_alt"></i> Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Services</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Portfolio Area Start -->
    <section class="akame-portfolio section-padding-0-80 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="portfolio-menu text-center mb-50">
                        <!--<button class="btn active" data-filter="*">All</button>-->
						<?php
						
							#$query  = "SELECT * FROM service";
							#$result = mysqli_query($conn, $query);
							#while($row = mysqli_fetch_assoc($result)){
							#	echo "<button class='btn' data-filter='.{$row['category']}'>{$row['category']}</button>";
							#}
							
							$query2 = "SELECT * FROM vendor_service";
							$result2 = mysqli_query($conn, $query2);

							echo "<div class='row akame-portfolio-area'>";
							
							while($row1 = mysqli_fetch_assoc($result2)){
							echo "<div class='col-12 col-sm-6 col-lg-4 akame-portfolio-item mb-30 wow fadeInUp' data-wow-delay='200ms'>";

							echo "
									<div class='akame-portfolio-single-item'>
										<img src='upload/{$row1['img']}' alt=''>";


							echo "<div class='overlay-content d-flex align-items-center justify-content-center'>
								<div class='overlay-text text-center'>
									<a href='service.php?vs_serial={$row1['vs_serial']}&vs_name={$row1['vs_name']}'><h4>{$row1['vs_name']}</h4></a>
									<a class='btn akame-btn active' href='user_reserve.php?vs_serial={$row1['vs_serial']}&vs_name={$row1['vs_name']}'>Appointment</a>

								</div>
								</div>";


							echo "<a href='upload/{$row1['img']}' class='thumbnail-zoom'><i class='icon_search'></i></a>
								</div>
							</div>
							</div>";
							}
						
						?>

            
</div>
        </div>
        </div>
            <div class="row">
                <div class="col-12">
                    <div class="view-all-btn mt-30 text-center">
                        <a href="category.php" class="btn akame-btn">View All Vendors</a>
                    </div>
                </div>
            </div>
        
    </section>
    <!-- Portfolio Area End -->

    <!-- Border -->
    <div class="container">
        <div class="border-top"></div>
    </div>
<?php include("includes/public_footer.php") ?>   