<?php 

require 'admin/db/config.php';


$IProductID=$_GET['pd-id'];

$Queryer ="SELECT * FROM i_products WHERE IProductID='$IProductID'";
$Resulter = $conn->query($Queryer);
$Rower = $Resulter->fetch_assoc();


include 'header.php';?>

    <section id="event" class="event-area default-padding">
        <div class="container">
            <div class="row">
                <div class="event-items">

                    <!-- Single Item -->
                    <div id="Chapel" class="item vertical col-md-12">
                        
                        <div class="info">
                            <h2>
                             <?php echo $Rower['IPName'];?>
                            </h2><br>
                            
                           
                            
                            <center><img src="uploads/product-image/<?php echo $Rower['IPImage']; ?>" style="width:400px"></center> <br><br>
                            
                          
                            
                            
                            <hr>
                            <br>

                            <p class="text-justify">
                                <?php echo $Rower['IPDescription'];?>
                            </p><br>
                            
                             <?php if(!empty($Rower['IPPDF']))
                            { ?>
                            
                             <a href="uploads/product-pdf/<?php echo $Rower['IPPDF']; ?>" class="btn btn-theme effect btn-md" style="background-color: <?php echo $C_color; ?>;" target="_blank">Brochure</a>
                            
                            <?php
                            }; 
                            ?>
                        </div>
                    </div>
                    
               
                </div>
            </div>
        </div>
    </section>


    <?php include 'footer.php';?>