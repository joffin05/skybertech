<?php 

$ICategoryID=$_GET['cat-id'];

require 'admin/db/config.php';

$Query ="SELECT * FROM i_photogallery WHERE IPCat='$ICategoryID' ORDER BY IPhotoID DESC";
$Result = $conn->query($Query);

$Query_cat ="SELECT * FROM i_category WHERE ICategoryID='$ICategoryID'";
$Result_cat = $conn->query($Query_cat);
$Row_cat = $Result_cat->fetch_assoc();


include 'header.php';?>
    <!-- Start Breadcrumb 
    ============================================= -->

    <!-- End Breadcrumb -->

    <!-- Start Portfolio
    ============================================= -->
    <div id="portfolio" class="portfolio-area default-padding">
        <div class="container">
            <div class="portfolio-items-area text-center">
                <div class="row">
                    <h3>
                    <?php echo $Row_cat['ICName']; ?>
                    </h3>
                    <div class="col-md-12 portfolio-content">
                        <div class="row magnific-mix-gallery masonary text-light">
                            <div id="portfolio-grid" class="portfolio-items col-4">

                               <?php while($Row = $Result->fetch_assoc())
                               {
                               ?>

                                <div class="pf-item">
                                    <div class="item-effect">
                                        <img src="uploads/photo-gallery/<?php echo $Row['IPImage']; ?>" style="height: 300px;" alt="thumb" /></br></br>
                                        <div style="height: 200px">
                                        <p style="color: #002147"><strong>
                                        <?php echo $Row['IPTitle']; ?></strong>
                                        </p>
                                        <p style="color: #002147"><?php echo $Row['IPDescription']; ?></p>
                                        </div>
                                        
                                        <div class="overlay">
                                            <a href="uploads/photo-gallery/<?php echo $Row['IPImage']; ?>" class="item popup-link"><i class="fa fa-expand"></i></a>
                                        </div>

                                      
                                        
                                     

                                    </div>
                                </div>

                                <?php }; ?>  

                         
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Portfolio -->


<?php include 'footer.php';?>