<?php 

require 'admin/db/config.php';


$INewsID=$_GET['n-id'];

$Queryer ="SELECT * FROM i_news WHERE INewsID='$INewsID'";
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
                             <?php echo $Rower['INTitle'];?>
                            </h2><br>
                            
                            <?php if(!empty($Rower['INImage']))
                            { ?>
                            
                            <center><img src="uploads/news-image/<?php echo $Rower['INImage'];?>" style="width:400px"></center> <br><br>
                            
                            <?php
                            }; 
                            ?>
                            
                            
                            <span style="color: #666666;"><i class="fas fa-clock"></i> <?php $NewsDate=$Rower['Timestamp']; echo date("j, F, Y", strtotime("$NewsDate"));?></span>
                            <hr>
                            <br>

                            
                                <?php echo $Rower['INDescription'];?>
                           <br>
                            
                            
                            <?php if(!empty($Rower['INPDF']))
                            { ?>
                            
                             <a href="uploads/news-pdf/<?php echo $Rower['INPDF']; ?>" class="btn btn-theme effect btn-md" style="background-color: <?php echo $C_color; ?>;" target="_blank">PDF</a>
                            
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