<?php 

require 'admin/db/config.php';


$IServiceID=$_GET['sr-id'];

$Queryer ="SELECT * FROM i_service WHERE IServiceID='$IServiceID'";
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
                             <?php echo $Rower['ISName'];?>
                            </h2><br>
                                     
                            
                            <center><img src="uploads/service-image/<?php echo $Rower['ISImage']; ?>" style="width:400px"></center> <br><br>
                            
                          
                            <hr>
                            <br>

                            <p class="text-justify">
                                <?php echo $Rower['ISDescription'];?>
                            </p>
                        </div>
                    </div>
                    
               
                </div>
            </div>
        </div>
    </section>


    <?php include 'footer.php';?>