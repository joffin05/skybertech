<?php 

$ICategoryID=$_GET['cat-id'];

require 'admin/db/config.php';

$Query ="SELECT * FROM i_videogallery WHERE IVCat='$ICategoryID' ORDER BY IVideoID DESC";
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

    <!-- End Portfolio -->


               <div id="blog" class="blog-area default-padding advisor-area bg-gray carousel-shadow default-padding bottom-less">
        <div class="container">
            
            <div class="row">
                    <center><h3>
                    <?php echo $Row_cat['ICName']; ?>
                    </h3></center><br>
             
                    <!-- Single Item -->


                        
                      <?php while($Row = $Result->fetch_assoc())
                      {
                      ?> 

                      <div class="col-md-3">
                        <div class="item">
                            <div class="thumb">
                             
                             <div>
                              <a class="popup-youtube" href="http://www.youtube.com/watch?v=<?php echo $Row['IVUrl']; ?>"><img src="https://img.youtube.com/vi/<?php echo $Row['IVUrl']; ?>/mqdefault.jpg" alt="Thumb"></a>
                             </div>
                                
                            </div><br>
                            <center><p style="color: #002147">
                            <?php echo $Row['IVTitle']; ?>
                            </p></center>
                            
                        </div>
                        </div>
                      
                      <?php }; ?> 
          
               
            </div><br>
            
        </div>
    </div>


<?php include 'footer.php';?>