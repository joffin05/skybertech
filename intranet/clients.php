<?php 

require 'admin/db/config.php';

$Query_clients ="SELECT * FROM i_clients ORDER BY ICLSortOrder ASC";
$Result_clients = $conn->query($Query_clients);

include 'header.php';?>


    
            <section id="event" class="event-area bg-gray single-view default-padding">
        <div class="container">
            <div class="row">
                <div class="site-heading text-center" style="margin-bottom:0px">
                    <div class="col-md-8 col-md-offset-2">
                        <h2>Our Clients</h2>
                        <p>
                        </p>
                    </div>
                </div>
            </div>
            
<div class="col-md-12">
<div class="row">


 <?php while($Row_clients = $Result_clients->fetch_assoc())
 {
 ?> 

 <a href="<?php echo $Row_clients['ICLUrl']; ?>" target="_blank"><div class="col-md-3 col-xs-6" style="margin-top: 20px; padding-right:2px; padding-bottom: 5px; padding-top:10px; margin-bottom:5px">   
 <img src="uploads/client-image/<?php echo $Row_clients['ICLPhoto']; ?>" alt="thumb"  style="height: 103px; width: 200px" /> 
 <h4>
 </h4>
 </div> </a>

<?php }; ?> 





</div>
</div>
            


       
    </section>


<?php include 'footer.php';?>