<?php
include("includes/public_header.php");

$query  = "SELECT * FROM vs_img WHERE vs_serial = {$_GET['vs_serial']}";
$result = mysqli_query($conn, $query);
$row    = mysqli_fetch_assoc($result);

$q    = "SELECT v_id FROM vendor_service WHERE vs_serial = {$_GET['vs_serial']}";
$r    = mysqli_query($conn, $q);
$rows = mysqli_fetch_assoc($r);

$qu = "SELECT phone FROM vendor WHERE v_id = {$rows['v_id']}";
$ru = mysqli_query($conn, $qu);
$r  = mysqli_fetch_assoc($ru);

/*echo "<pre>";
print_r($row);
die;*/
	

/*while($row = mysqli_fetch_assoc($result)){*/

    echo "<!-- Breadcrumb Area Start -->
    <section class='breadcrumb-area section-padding-80'>
        <div class='container'>
            <div class='row'>
                <div class='col-12'>
                    <div class='breadcrumb-content'>
                        <h2>Our Services</h2>
						<span>Call us on: {$r['phone']}</span>
                        <nav aria-label='breadcrumb'>
                            <ol class='breadcrumb'>
                                <li class='breadcrumb-item'><a href='index.php'><i class='icon_house_alt'></i> Home</a></li>";
                              echo " <li class='breadcrumb-item active' aria-current='page'>{$_GET['vs_name']}</li>
                            </ol>
							<a class='btn akame-btn active' href='user_reserve.php?vs_serial={$_GET['vs_serial']}&vs_name={$_GET['vs_name']}'>Appointment</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Area End -->

    <!-- Service Area Start -->
    <section class='akame-service-area'>";

    echo "<!-- Single Service Item -->
        <div class='single--service--item d-flex flex-wrap align-items-center'>
            <!-- Service Content -->
            <div class='service-content'>
                <div class='service-text'>
                    <h2>{$row['desc1']}</h2>
                    <!--<p><span>{$row['desc1']}</span></p>-->
                </div>
            </div>
            <!-- Service Thumbnail -->
            <div class='service-thumbnail bg-img jarallax' style='background-image: url(upload/{$row['img1']});'></div>
        </div>

        <!-- Single Service Item -->
        <div class='single--service--item odd-item d-flex flex-wrap align-items-center'>
            <!-- Service Thumbnail -->
            <div class='service-thumbnail bg-img jarallax' style='background-image: url(upload/{$row['img2']});'></div>

            <!-- Service Content -->
            <div class='service-content'>
                <div class='service-text'>
                    <h2>{$row['desc2']}</h2>
                    <!--<p><span></span></p>-->
                </div>
            </div>
        </div>

        <!-- Single Service Item -->
        <div class='single--service--item d-flex flex-wrap align-items-center'>
            <!-- Service Content -->
            <div class='service-content'>
                <div class='service-text'>
                    <h2>{$row['desc3']}</h2>
                    <!--<p><span>{$row['desc3']}</span></p>-->
                </div>
            </div>
            <!-- Service Thumbnail -->
            <div class='service-thumbnail bg-img jarallax' style='background-image: url(upload/{$row['img3']});'></div>
        </div>

    </section>
    <!-- Service Area End -->";
/*}*/
include("includes/public_footer.php");
?>