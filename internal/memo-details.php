<?php 

require 'admin/db/config.php';

$IMemoID=$_GET['m-id'];

$Queryer ="SELECT * FROM i_memo WHERE IMemoID='$IMemoID'";
$Resulter = $conn->query($Queryer);
$Rower = $Resulter->fetch_assoc();


$Queryer_image ="SELECT * FROM imemo_images WHERE IMemoMID='$IMemoID' ORDER BY IMEMIMGID ASC";
$Resulter_image = $conn->query($Queryer_image);


include 'header.php';?>


        <div class="top-cat-area inc-trending-courses about-area default-padding">
        <div class="container">
            <div class="row">


                <!-- End Home Sidebar -->
                <div class="col-md-12 home-sidebar">
                    <!-- Start Latest Post -->
                    <div class="sidebar-item latest-posts trending-courses-box" >
                       
                        <div class="trending-courses-items">

                            <div class="item">
                                <h4>
                                    <a href="#"><?php echo $Rower['IMTitle'];?></a>
                                </h4>
                                <div class="meta">
                                    <i class="fas fa-file"></i> <a href="#"><?php echo $Rower['IMType'];?></a> 
                                    <span></span>
                                </div>
                                <hr> <br>
                                <p class="text-justify">
                                <?php echo $Rower['IMDescription'];?>
                            </p>
                            <br>


                    <div class="row">

                    <?php while($Rower_image = $Resulter_image->fetch_assoc())
                    {
                    ?>

                    <div class="col-sm-12 col-md-12">

                    <center><img src="uploads/memo-image/<?php echo $Rower_image['MMImages']; ?>" style="border: 2px solid Grey;"></center><br><br>
                   

                    </div>

                    <?php }; ?>
                      

                    </div>
                            </div>


                           
                        </div>
                    </div>
                    <!-- End Latest Posts -->
                </div>
                <!-- End Home Sidebar -->

            </div>
        </div>
    </div>


    <?php include 'footer.php';?>