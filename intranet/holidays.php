<?php 

require 'admin/db/config.php';




$Queryer ="SELECT * FROM i_holiday WHERE IHolidayID=1";
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
                             <?php echo $Rower['IHTitle'];?>
                            </h2>
                        
                            <hr>
                            <br>

                            
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="uploads/holiday-pdf/<?php echo $Rower['IHPDF'];?>#toolbar=0"></iframe>
</div>
                            
                        </div>
                    </div>
                    
               
                </div>
            </div>
        </div>
    </section>


    <?php include 'footer.php';?>