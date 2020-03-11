
<?php 



require 'admin/db/config.php';

$Query_ban ="SELECT * FROM i_banner ORDER BY IBSortOrder ASC";
$Result_ban = $conn->query($Query_ban);
$Row_ban = $Result_ban->fetch_assoc();


$Query_software ="SELECT * FROM i_software ORDER BY SortOrder ASC";
$Result_software = $conn->query($Query_software);


$Query_news ="SELECT * FROM i_news ORDER BY INSortOrder ASC";
$Result_news = $conn->query($Query_news);

$Query_Photo ="SELECT i_photogallery.*, i_category.* FROM i_photogallery INNER JOIN i_category ON i_photogallery.IPCat=i_category.ICategoryID ORDER BY i_photogallery.IPhotoID DESC";
$Result_Photo = $conn->query($Query_Photo);

$Query_Video ="SELECT i_videogallery.*, i_category.* FROM i_videogallery INNER JOIN i_category ON i_videogallery.IVCat=i_category.ICategoryID ORDER BY i_videogallery.IVideoID DESC";
$Result_Video = $conn->query($Query_Video);


$Query_clients ="SELECT * FROM i_clients ORDER BY ICLSortOrder ASC";
$Result_clients = $conn->query($Query_clients);

include 'header.php';

?>

    <!-- Start Banner 
    ============================================= -->
    <div class="container">
    
    <div class="row">

    <div class="col-md-12 home-sidebar" style="padding-right: 0px;padding-left: 0px">
    <div class="sidebar-item latest-posts trending-courses-box" >
    <h4 style="background:#EEEEEE">
    


    
    <marquee onmouseover="this.stop();" onmouseout="this.start();">
    <?php 
    
    while($Row_news = $Result_news->fetch_assoc())
    { ?>

    <a href="news-details.php?n-id=<?php echo $Row_news['INewsID']; ?>"><span><?php echo $Row_news['INTitle']; ?> &nbsp;&nbsp;&nbsp;&nbsp; <span></a>

    <?php } ?>
   </marquee>
    
    </h4>
    </div>
    </div>

    <div class="col-md-8 thumb" style="padding-left:0px; padding-right: 0px;">
    <div id="home" class="banner-area content-top-heading less-paragraph text-normal" style="height:498px;padding-right:0px">
        <div id="bootcarousel" class="carousel slide animate_text carousel-fade" data-ride="carousel">

            <!-- Wrapper for slides -->
            <div class="carousel-inner text-light carousel-zoom" >

                <div class="item active">
                    <div class="slider-thumb bg-fixed" style="background-image: url(uploads/banner-image/<?php echo $Row_ban['IBIMage']; ?>);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft"><?php echo $Row_ban['IBTitle']; ?></h3>
                                           
                                         
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php while($Row_ban = $Result_ban->fetch_assoc())
                {
                ?>

                <div class="item">
                    <div class="slider-thumb bg-fixed" style="background-image: url(uploads/banner-image/<?php echo $Row_ban['IBIMage']; ?>);"></div>
                    <div class="box-table shadow dark">
                        <div class="box-cell">
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="content">
                                            <h3 data-animation="animated slideInLeft"><?php echo $Row_ban['IBTitle']; ?></h3>
                                            
                                           
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php }; ?> 
         
            </div>
            <!-- End Wrapper for slides -->

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#bootcarousel" data-slide="prev">
                <i class="fa fa-angle-left"></i>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#bootcarousel" data-slide="next">
                <i class="fa fa-angle-right"></i>
                <span class="sr-only">Next</span>
            </a>

        </div>
    </div>
    </div>
   <div class="col-md-4 home-sidebar" style="padding-left:0px; padding-right: 0px;">
                    <!-- Start Latest Post -->

                   <a href="circulars.php"><div class="sidebar-item latest-posts trending-courses-box">
                                                <div class="trending-courses-items" style="padding:0px;">
                            <div class="item">
                              <center><img src="assets/img/circulars.jpg"></center>
                            </div>
                            
                        </div>
                        <h4  style="background:<?php echo $C_color; ?>">Circulars</h4>

                    </div></a> 
                    <a href="policies.php"><div class="sidebar-item latest-posts trending-courses-box">
                                                <div class="trending-courses-items" style="padding:0px;">
                            <div class="item">
                              <center><img src="assets/img/policies.jpg"></center>
                            </div>
                        </div>
                        <h4  style="background:<?php echo $C_color; ?>">Policies</h4>

                    </div></a>

                    
    </div>
    </div>

        <div class="about-area default-padding pb0">
        <div class="container">
            <div class="row">
                <div class="about-info">
                  
                    <div class="col-md-12 info">
                        <h2>Welcome</h2>
                        <p>
                            
<?php echo $a_home ;?>
                        </p>
                        <a href="about.php" class="btn btn-theme effect btn-md" style="background-color: <?php echo $C_color; ?>;">Read More</a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div><br><br>


    <!-- End Banner -->

    <!-- Start About 
    ============================================= -->


        <section id="event" class="event-area bg-gray single-view default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center" style="margin-bottom:0px">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Softwares</h2>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
            
<div class="col-md-12">
<div class="row">

<?php while($Row_software = $Result_software->fetch_assoc())
{
?> 
 <div class="col-md-2 col-xs-6" style="margin-top: 10px; padding-right:2px">   
 <img src="uploads/software-image/<?php echo $Row_software['ISoftImage']; ?>" style="height: 200px;" alt="thumb" /> 

<div class="info" style="height:100px;background:#ffff;padding-top:10px; padding-left:10px; padding-right:10px">
<h4>
<a href="<?php echo $Row_software['ISoftUrl']; ?>" target="_blank"><?php echo $Row_software['ISoftTitle']; ?></a>
</h4>
</div>

</div> 
    
<?php }; ?> 

</div>
</div>
            


       
    </section>


       <div id="blog" class="blog-area default-padding advisor-area bg-gray carousel-shadow default-padding bottom-less" style="margin-top:0px; padding-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Photo Gallery</h2>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-items advisor-carousel-solid owl-carousel owl-theme">
                    <!-- Single Item -->


                        
                      <?php while($Row_Photo = $Result_Photo->fetch_assoc())
                      {
                      ?> 
                        <div class="item">
                            <div class="thumb">
                                <img src="uploads/photo-gallery/<?php echo $Row_Photo['IPImage']; ?>" alt="Thumb" style="height: 300px;">
                                <div class="date" style="background:<?php echo $C_color; ?>;">
                                    <h4 style="color:#ffff;"><span></span><?php echo $Row_Photo['IPTitle']; ?></h4>
                                </div>
                                
                            </div>
                            
                        </div>
                      
                      <?php }; ?> 
          
                </div>


            </div><br>
            <center><a href="photo-gallery.php" class="btn btn-theme effect btn-md" style="background-color: <?php echo $C_color; ?>;">View All</a> </center>
            
        </div>
    </div>



           <div id="blog" class="blog-area default-padding advisor-area bg-gray carousel-shadow default-padding bottom-less"  style="margin-top:0px; padding-top: 0px;">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Video Gallery</h2>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="blog-items advisor-carousel-solid owl-carousel owl-theme">
                    <!-- Single Item -->


                        
                      <?php while($Row_Video = $Result_Video->fetch_assoc())
                      {
                      ?> 
                        <div class="item">
                            <div class="thumb">
                             
                             <div>
                              <a class="popup-youtube" href="http://www.youtube.com/watch?v=<?php echo $Row_Video['IVUrl']; ?>"><img src="https://img.youtube.com/vi/<?php echo $Row_Video['IVUrl']; ?>/mqdefault.jpg" alt="Thumb"></a>
                             </div>
                                
                            </div>
                            
                        </div>
                      
                      <?php }; ?> 
          
                </div>
            </div><br>
            <center><a href="video-gallery.php" class="btn btn-theme effect btn-md" style="background-color: <?php echo $C_color; ?>;">View All</a> </center>
        </div>
    </div>


            
        </div>
    </div>


<script>
    $(document).ready(function() {
    $('.popup-youtube, .popup-vimeo, .popup-gmaps').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,

        fixedContentPos: false
    });
});
</script>




   

    <?php 

    include 'footer.php';?>