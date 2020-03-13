<?php 

require 'admin/db/config.php';


$Query_news ="SELECT * FROM i_news ORDER BY INSortOrder ASC";
$Result_news = $conn->query($Query_news);



include 'header.php';?>


       <div class="top-cat-area inc-trending-courses about-area default-padding">
        <div class="container">
            <div class="row">

                <div class="site-heading text-center" style="margin-bottom: 0px">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>News</h2>
                    </div>
                </div>


                <!-- End Home Sidebar -->
                <div class="col-md-12 home-sidebar">
                    <!-- Start Latest Post -->
                    <div class="sidebar-item latest-posts trending-courses-box" >
                        
                       


                            <?php while($Row_news = $Result_news->fetch_assoc())
                            {
                            ?> 

                             <div class="trending-courses-items">

                            <div class="item">
                                <h4>
                                    <a href="news-details.php?n-id=<?php echo $Row_news['INewsID']; ?>"><?php echo $Row_news['INTitle']; ?></a>
                                </h4>
                                <span style="color: #666666;"><strong><?php $NewsDate=$Row_news['Timestamp']; echo date("j, F, Y", strtotime("$NewsDate"));?></strong></span>
                                <div class="meta">

                                  

                                   
                                    <a href="news-details.php?n-id=<?php echo $Row_news['INewsID']; ?>" class="more">Read More >></a>
                                    
                                </div>
                            </div>
                            </div> <br>

                            <?php }; ?> 


                            
                        
                    </div>
                    <!-- End Latest Posts -->
                </div>
                <!-- End Home Sidebar -->

            </div>
        </div>
    </div>

    <?php include 'footer.php';?>