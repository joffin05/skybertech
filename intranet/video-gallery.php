<?php



require 'admin/db/config.php';

$Query ="SELECT * FROM i_category WHERE ICType!='Photo' ORDER BY ICategoryID DESC";
$Result = $conn->query($Query);


 include 'header.php';?>
    


    <!-- Start gallery 
    ============================================= -->
     <div class="popular-courses default-padding without-carousel">
        <div class="container">
            <div class="row">
                <center><h3>
                Video Gallery
                </h3></center><br>
                <div class="popular-courses-items">
                    
                    <!-- Single Item -->
                    
                 <?php while($Row = $Result->fetch_assoc())
                 {
                 ?>
                    <div class="col-md-3 col-sm-6 equal-height">
                        <div class="item">
                            <div class="thumb">
                                <a href="video-gallery-details.php?cat-id=<?php echo $Row['ICategoryID'];?>">
                                    <img src="uploads/category-image/<?php echo $Row['ICImage']; ?>" alt="Thumb">
                                </a>
                                <div class="price"><?php echo $Row['ICName']; ?></div>
                            </div>
                        </div>
                    </div>
                 
                 <?php }; ?>  

          
                    <!-- End Single Item -->                         
                </div>
            </div>
        </div>
    </div>
    <!-- End gallery -->


<?php include 'footer.php';?>